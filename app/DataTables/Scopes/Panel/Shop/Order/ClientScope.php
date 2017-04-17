<?php

namespace App\DataTables\Scopes\Panel\Shop\Order;

use App\Modules\Auth\User;
use Yajra\Datatables\Contracts\DataTableScopeContract;

class ClientScope implements DataTableScopeContract
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('user_id', $this->user->id);
    }
}
