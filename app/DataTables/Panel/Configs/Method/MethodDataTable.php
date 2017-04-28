<?php

namespace App\DataTables\Panel\Configs\Method;

use App\DataTables\GustperxDataTables;
use App\Modules\Config\Methods\Method;

class MethodDataTable extends GustperxDataTables
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
            ->editColumn('status', function (Method $method) {

                switch ($method->status) {

                    case 'publish':

                        return "<span class='label label-sm label-success'>{$method->status}</span>";

                        break;

                    case 'draft':

                        return "<span class='label label-sm label-danger'>{$method->status}</span>";

                        break;

                    default:

                        return "<span class='label label-sm label-danger'>Error</span>";
                }
            })
            ->editColumn('updated_at', function (Method $method) {
                return $method->updated_at->format('d M Y');
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
        $query = Method::query();

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
            'title'      => ['title' => 'Titulo'],
            'status'     => ['orderable' => false, 'searchable' => false, 'title' => 'Estatus'],
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
        return 'method_' . time();
    }
}
