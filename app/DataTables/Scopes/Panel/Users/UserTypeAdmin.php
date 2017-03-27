<?php

namespace App\DataTables\Scopes\Panel\Users;

use Yajra\Datatables\Contracts\DataTableScopeContract;

class UserTypeAdmin implements DataTableScopeContract
{
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('type', 'admin');
    }
}
