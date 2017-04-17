<?php

namespace App\DataTables\Panel\Shop;

use App\DataTables\GustperxDataTables;
use App\Modules\Shop\Orders\Order;

class OrderDataTable extends GustperxDataTables
{
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Order::query()->with('details');

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
            'status',
            // add your columns
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'order_' . time();
    }
}
