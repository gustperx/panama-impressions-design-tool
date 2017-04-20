<?php

namespace App\DataTables\Panel\Products;

use App\DataTables\GustperxDataTables;
use App\Modules\Products\Designs\ProductDesign;

class DesignDataTable extends GustperxDataTables
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
            ->editColumn('source', function (ProductDesign $design) {

                return "<div class='col-md-3'> <img src='/storage/{$design->source}' class='img-responsive'> </div>";

            })
            ->editColumn('updated_at', function (ProductDesign $design) {
                return $design->updated_at->format('d M Y');
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
        $query = ProductDesign::query();

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
            'source'     => ['orderable' => false, 'searchable' => false, 'title' => 'Referencia', 'width' => '300px'],
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
        return 'productsDesign_' . time();
    }
}
