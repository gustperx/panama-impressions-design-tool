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

    private $order;

    private $bank;

    private $method;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Payment     $payment,
        Order       $order,
        Bank        $bank,
        Method      $method
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->payment     = $payment;
        $this->order       = $order;
        $this->bank        = $bank;
        $this->method      = $method;
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
        $list_order  = $this->order->orderList();

        $list_bank   = $this->bank->bankList();

        $list_method = $this->method->methodList();
        
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
            //'file_1'    => 'file|max:5120',
        ]);

        $order = $this->order->findOrFail($request->get('order_id'));
        
        $this->payment->create([
            'user_id'   => $order->user->id,
            'order_id'  => $order->id,
            'bank_id'   => $request->get('bank_id'),
            'method_id' => $request->get('method_id'),
            'status'    => 1,
            'amount'    => $request->get('amount'),
            'reference' => $request->get('reference'),
            //'file_1',
            //'motive',
        ]);

        Alert::success("Pago registrado satisfactoriamente");

        return back();
    }

    public function approved(Payment $payment)
    {
        if ($payment->status == 3) {

            $message = [

                'title'   => 'Orden Cancelada',

                'message' => 'Disculpe no puede realizar la acción seleccionada sobre una orden que esta cancelada',

                'type'    => 'error'
            ];

        } else {

            if ($payment->status == 1) {

                $payment->update(['status' => 2]);

                $message = [

                    'title'   => trans('products.generals.good-job'),

                    'message' => 'Orden entregada al cliente',

                    'type'    => 'success'
                ];

            } else {

                $message = [

                    'title'   => 'Error de salto de estatus',

                    'message' => 'No puede atrasar el estatus de la orden o adelantarlo de mas',

                    'type'    => 'info'
                ];

            }

        }

        return response()->json($message, 200);
    }

    public function rejected(Payment $payment)
    {
        $payment->update(['status' => 3]);

        $message = [

            'title'   => trans('products.generals.good-job'),

            'message' => 'Orden Cancelada',

            'type'    => 'success'
        ];

        return response()->json($message, 200);
    }
}
