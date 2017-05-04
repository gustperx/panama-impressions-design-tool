<?php

namespace App\DataTables\Panel\Payments;

use App\DataTables\GustperxDataTables;
use App\Modules\Payments\Payment;
use Facades\App\Facades\Settings;

class PaymentDataTable extends GustperxDataTables
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($row) {
                return view('layouts.builder.dataTable.partials.check-action', compact('row'));
            })
            ->editColumn('user', function (Payment $payment) {
                return $payment->user->fullname;
            })
            ->editColumn('method', function (Payment $payment){
                return $payment->method->title;
            })
            ->editColumn('created_at', function (Payment $payment) {
                return $payment->created_at->format('d M Y');
            })
            ->editColumn('amount', function (Payment $payment) {
                return "<span class='label label-sm label-success'>" .Settings::getGeneralConfig()->coin. " {$payment->amount}</span>";
            })
            ->editColumn('status', function (Payment $payment) {

                switch ($payment->status) {

                    case 1:

                        return "<span class='label label-sm label-default'>Espera de Aprobación</span>";

                        break;

                    case 2:

                        return "<span class='label label-sm label-success'>Aprobada</span>";

                        break;

                    case 3:

                        return "<span class='label label-sm label-danger'>Rechazada</span>";

                        break;

                    default:

                        return "<span class='label label-sm label-danger'>Error Estatus</span>";
                }

            })
            ->escapeColumns(['action'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Payment::query();

        return $this->applyScopes($query);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            //'id'         => ['orderable' => false, 'searchable' => false],
            'order_id'   => ['title' => 'Orden'],
            'user'       => ['orderable' => false, 'searchable' => false, 'title' => 'Cliente'],
            'amount'     => ['orderable' => false, 'searchable' => false, 'title' => 'Pago'],
            'reference'  => ['orderable' => false, 'searchable' => false, 'title' => 'Referencia'],
            'method'     => ['orderable' => false, 'searchable' => false, 'title' => 'Método'],
            'status'     => ['orderable' => false, 'searchable' => false, 'title' => 'Estatus'],
            'created_at' => ['orderable' => false, 'searchable' => false, 'title' => 'Creado']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'payment_' . time();
    }
}
