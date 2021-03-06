<?php

namespace App\DataTables\Scopes\Panel\Products;

use App\Modules\Products\Product;
use Yajra\Datatables\Contracts\DataTableScopeContract;

class ProductScope implements DataTableScopeContract
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('product_id', $this->product->id);
    }
}
