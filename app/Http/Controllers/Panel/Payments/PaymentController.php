<?php

namespace App\Http\Controllers\Panel\Payments;

use App\DataTables\Panel\Payments\PaymentDataTable;
use App\Modules\Config\Banks\Bank;
use App\Modules\Config\Methods\Method;
use App\Modules\Payments\Admin\HtmlBuilder;
use App\Modules\Payments\Payment;
use App\Modules\Shop\Orders\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class PaymentController extends Controller
{
    private $htmlBuilder;

    private $payment;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Payment $payment
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->payment     = $payment;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Payments\PaymentDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentDataTable $dataTable)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions();

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex();

        return $dataTable
            ->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_order  = Order::where('status', 2)->pluck('id', 'id')->toArray();

        $list_bank   = Bank::pluck('Name', 'id')->toArray();

        $list_method = Method::where('status', 'publish')->pluck('title', 'id')->toArray();
        
        $breadcrumb  = $this->htmlBuilder->breadcrumbCreate();

        $form        = $this->htmlBuilder->formBuilder($list_order, $list_bank, $list_method);

        $dynamic     = ['type' => 'open', 'files' => true, 'route' => 'payments.admin.create', 'title' => "Nuevo"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'dynamic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'order_id'  => 'required|exists:orders,id',
            'bank_id'   => 'required|exists:banks,id',
            'method_id' => 'required|exists:methods,id',
            'amount'    => 'required|numeric|max:1000000000',
            'reference' => 'required|string|max:100',
            'file_1'    => 'file|max:5120',
        ]);

        //$bank = $this->payment->create($request->all());

        //Alert::success("Banco {$bank->name} creado satisfactoriamente");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Payments\Payment  $payment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        dd($payment);
    }
}
