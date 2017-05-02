<?php

namespace App\DataTables\Panel\Payments;

use App\DataTables\GustperxDataTables;
use App\Modules\Payments\Payment;

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
            ->editColumn('updated_at', function (Payment $payment) {
                return $payment->updated_at->format('d M Y');
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
            'id',
            'user_id',
            'updated_at'
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
