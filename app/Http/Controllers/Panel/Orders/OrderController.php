<?php

namespace App\Http\Controllers\Panel\Orders;

use App\DataTables\Panel\Shop\OrderDataTable;
use App\Modules\Shop\Builder\Orders\Admin\HtmlBuilder;
use App\Modules\Shop\Orders\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $htmlBuilder;

    private $order;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Order $order
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->order       = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Shop\OrderDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $dataTable)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions();

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex();

        return $dataTable->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
    }

    public function cancel(Request $request, Order $order)
    {
        $order->update(['status' => 3]);

        $message = [

            'title'   => trans('products.generals.good-job'),

            'message' => 'Orden Cancelada',

            'type'    => 'success'
        ];

        return response()->json($message, 200);
    }

    public function approved(Request $request, Order $order)
    {
        if ($order->status == 3) {

            $message = [

                'title'   => 'Orden Cancelada',

                'message' => 'Disculpe no puede realizar la acción seleccionada sobre una orden que esta cancelada',

                'type'    => 'error'
            ];

        } else {

            if (($order->status == 2) || $order->status < 5 ) {

                $order->update(['status' => 4]);

                $message = [

                    'title'   => trans('products.generals.good-job'),

                    'message' => 'Orden Aprobada',

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

    public function process(Request $request, Order $order)
    {
        if ($order->status == 3) {

            $message = [

                'title'   => 'Orden Cancelada',

                'message' => 'Disculpe no puede realizar la acción seleccionada sobre una orden que esta cancelada',

                'type'    => 'error'
            ];

        } else {

            if (($order->status == 4) || ($order->status < 6)) {

                $order->update(['status' => 5]);

                $message = [

                    'title'   => trans('products.generals.good-job'),

                    'message' => 'Orden en Construcción',

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

    public function send(Request $request, Order $order)
    {
        if ($order->status == 3) {

            $message = [

                'title'   => 'Orden Cancelada',

                'message' => 'Disculpe no puede realizar la acción seleccionada sobre una orden que esta cancelada',

                'type'    => 'error'
            ];

        } else {

            if (($order->status == 5) || ($order->status < 7)) {

                $order->update(['status' => 6]);

                $message = [

                    'title'   => trans('products.generals.good-job'),

                    'message' => 'Orden enviada al Cliente',

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

    public function received(Request $request, Order $order)
    {
        if ($order->status == 3) {

            $message = [

                'title'   => 'Orden Cancelada',

                'message' => 'Disculpe no puede realizar la acción seleccionada sobre una orden que esta cancelada',

                'type'    => 'error'
            ];

        } else {

            if (($order->status == 6) || ($order->status < 8)) {

                $order->update(['status' => 7]);

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
}
