<?php

namespace App\DataTables\Panel\Products;

use App\DataTables\GustperxDataTables;
use App\Modules\Products\Categories\Category;

class CategoryDataTable extends GustperxDataTables
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
            ->editColumn('type', function (Category $category) {

                switch ($category->type) {

                    case 'product':

                        return "<span class='label label-sm label-success'>Productos</span>";

                        break;

                    case 'design':

                        return "<span class='label label-sm label-primary'>Diseños</span>";

                        break;
                    default:

                        return "<span class='label label-sm label-error'>Error</span>";
                }

            })
            ->editColumn('element', function (Category $category) {

                switch ($category->type) {

                    case 'product':

                        return "<span class='label label-sm label-default'>{$category->products->count()}</span>";

                        break;

                    case 'design':

                        return "<span class='label label-sm label-default'>{$category->designs->count()}</span>";

                        break;
                    
                    default:

                        return "<span class='label label-sm label-error'>Error</span>";
                }
            })
            ->editColumn('updated_at', function (Category $category) {
                return $category->updated_at->format('d M Y');
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
        $query = Category::query();

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
            'type'       => ['orderable' => false, 'searchable' => false, 'title' => 'Tipo'],
            'element'    => ['orderable' => false, 'searchable' => false, 'title' => 'Elementos'],
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
        return 'productsCategory_' . time();
    }
}
