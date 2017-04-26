<?php

namespace App\DataTables\Panel\Products;

use App\DataTables\GustperxDataTables;
use App\Modules\Products\Product;
use Facades\App\Facades\Settings;

class ProductDataTable extends GustperxDataTables
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
            ->editColumn('model', function (Product $product) {
                return "<span class='label label-sm label-primary'>{$product->models()->count()}</span>";
            })
            ->editColumn('measure', function (Product $product) {
                return "<span class='label label-sm label-primary'>{$product->measures()->count()}</span>";
            })
            ->editColumn('unit_price', function (Product $product) {
                if ($product->unit_price) {

                    return "<span class='label label-sm label-success'> " .Settings::getGeneralConfig()->coin. " {$product->unit_price}</span>";

                } else {

                    return "<span class='label label-sm label-danger'> Undefined </span>";
                }
            })
            ->editColumn('status', function (Product $product) {

                switch ($product->status) {

                    case 'publish':

                        return "<span class='label label-sm label-success'>{$product->status}</span>";

                        break;

                    case 'draft':

                        return "<span class='label label-sm label-danger'>{$product->status}</span>";

                        break;

                    default:

                        return "<span class='label label-sm label-error'>Error</span>";
                }
            })
            ->editColumn('updated_at', function (Product $product) {
                return $product->updated_at->format('d M Y');
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
        $query = Product::query();

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
            'unit_price' => ['orderable' => false, 'searchable' => false, 'title' => 'Precio Unitario'],
            'model'      => ['orderable' => false, 'searchable' => false, 'title' => 'Modelos'],
            'measure'    => ['orderable' => false, 'searchable' => false, 'title' => 'Medidas'],
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
        return 'productsProduct_' . time();
    }
}
