<?php

namespace App\DataTables\Scopes\Panel\Shop\Order;

use App\Modules\Shop\Orders\Order;
use Yajra\Datatables\Contracts\DataTableScopeContract;

class OrderScope implements DataTableScopeContract
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('order_id', $this->order->id);
    }
}
