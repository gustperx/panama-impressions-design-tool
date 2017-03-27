<?php

namespace App\DataTables\Panel\Users;

use App\DataTables\GustperxDataTables;
use App\Modules\Auth\User;

class UsersRecycledDataTable extends GustperxDataTables
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
            ->onlyTrashed()
            ->addColumn('action', function ($row) {
                return view('layouts.builder.dataTable.partials.check-action', compact('row'));
            })
            ->editColumn('account', function (User $user) {
                return is_null($user->registration_token) ? "Verificada" : 'No Verificada';
            })
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('d M Y');
            })
            ->editColumn('deleted_at', function (User $user) {
                return $user->deleted_at->format('d M Y');
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
        $query = User::onlyTrashed();

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
            'first_name' => ['title' => 'Nombre'],
            'last_name'  => ['title' => 'Apellido'],
            'email'      => ['title' => 'Correo electrónico'],
            'status'     => ['orderable' => false, 'searchable' => false, 'title' => 'Estatus'],
            'account'    => ['orderable' => false, 'searchable' => false, 'title' => 'Cuenta'],
            'created_at' => ['orderable' => false, 'searchable' => false, 'title' => 'Creado'],
            'deleted_at' => ['orderable' => false, 'searchable' => false, 'title' => 'Eliminado'],
        ];
    }
}
