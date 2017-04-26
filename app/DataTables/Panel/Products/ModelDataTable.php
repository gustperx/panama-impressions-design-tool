<?php

namespace App\DataTables\Panel\Products;

use App\DataTables\GustperxDataTables;
use App\Modules\Products\Models\ProductModel;

class ModelDataTable extends GustperxDataTables
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
            ->editColumn('product_id', function (ProductModel $model) {
                return "<span class='label label-sm label-primary'>{$model->product->title}</span>";
            })
            ->editColumn('title', function (ProductModel $model) {
                return "<span class='label label-sm label-info'>{$model->title}</span>";
            })
            ->editColumn('thumbnail', function (ProductModel $model) {

                return "<div class='col-md-3'> <img src='/storage/{$model->thumbnail}' class='img-responsive'> </div>";
            })
            ->editColumn('status', function (ProductModel $productModel) {

                switch ($productModel->status) {

                    case 'publish':

                        return "<span class='label label-sm label-success'>{$productModel->status}</span>";

                        break;

                    case 'draft':

                        return "<span class='label label-sm label-danger'>{$productModel->status}</span>";

                        break;

                    default:

                        return "<span class='label label-sm label-danger'>Error</span>";
                }
            })
            ->editColumn('design', function (ProductModel $model) {

                if ($model->layers()->count() > 0) {

                    return "<span class='label label-sm label-primary'>Si</span>";

                } else {

                    return "<span class='label label-sm label-danger'>No</span>";
                }
            })
            ->editColumn('updated_at', function (ProductModel $model) {
                return $model->updated_at->format('d M Y');
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
        $query = ProductModel::query();

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
            'product_id' => ['orderable' => false, 'searchable' => false, 'title' => 'Producto'],
            'title'      => ['title' => 'Modelo'],
            'thumbnail'  => ['orderable' => false, 'searchable' => false, 'title' => 'Referencia', 'width' => '300px'],
            'design'     => ['orderable' => false, 'searchable' => false, 'title' => 'Diseño'],
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
        return 'viewProduct_' . time();
    }
}
