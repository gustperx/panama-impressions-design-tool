<?php

namespace App\Http\Controllers\Web\Shop;

use App\DataTables\Panel\Payments\PaymentDataTable;
use App\DataTables\Scopes\Panel\Shop\Order\OrderScope;
use App\Mail\Orders\OrderPayment;
use App\Modules\Config\Banks\Bank;
use App\Modules\Config\Methods\Method;
use App\Modules\Payments\Client\HtmlBuilder;
use App\Modules\Payments\Payment;
use App\Modules\Shop\Orders\Order;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
     * @param \App\Modules\Shop\Orders\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentDataTable $dataTable, Order $order)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions($order);

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex();

        return $dataTable->addScope(new OrderScope($order))
            ->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Modules\Shop\Orders\Order $order
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $list_bank   = $this->bank->bankList();

        $list_method = $this->method->methodList();

        $breadcrumb  = $this->htmlBuilder->breadcrumbCreate($order);

        $form        = $this->htmlBuilder->formBuilder($order, $list_bank, $list_method);

        $dynamic     = ['type' => 'open', 'files' => true, 'route' => 'payments.client.store', 'title' => "Agregar pago a la orden {$order->id}"];

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

        $payment = $this->payment->create([
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

        try {

            Mail::send(new OrderPayment($order, $payment, Auth::user()));

            Alert::info('Hemos enviado un correo de confirmación, en caso de que no aparezca revisa tu bandeja de correo no deseado.');

        } catch (Exception $exception) {

            Alert::warning("No se a podido enviar el correo de confirmación, por favor comuníquese con el administrador del sistema");
        }

        Alert::success("Pago registrado satisfactoriamente");

        return back();
    }
}
