<?php

namespace App\DataTables\Panel\Configs\Banks;

use App\DataTables\GustperxDataTables;
use App\Modules\Config\Banks\Bank;

class BankDataTable extends GustperxDataTables
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
            ->editColumn('account', function (Bank $bank) {

                switch ($bank->account) {

                    case 1:

                        return "<span class='label label-sm label-default'>Ahorro</span>";

                        break;

                    case 2:

                        return "<span class='label label-sm label-primary'>Corriente</span>";

                        break;
                    default:

                        return "<span class='label label-sm label-error'>Error</span>";
                }

            })
            ->editColumn('updated_at', function (Bank $bank) {
                return $bank->updated_at->format('d M Y');
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
        $query = Bank::query();

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
            'name'       => ['title' => 'Banco'],
            'code'       => ['title' => 'Cuenta'],
            'account'    => ['orderable' => false, 'searchable' => false, 'title' => 'Tipo'],
            'updated_at' => ['orderable' => false, 'searchable' => false, 'title' => 'Ultima actualización'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'configsBank_' . time();
    }
}
