<?php

namespace App\DataTables\Panel\Products;

use App\DataTables\GustperxDataTables;
use App\Modules\Config\Measures\Measure;

class MeasureDataTable extends GustperxDataTables
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
            ->editColumn('measure', function (Measure $measure) {
                return "{$measure->high} x {$measure->width}";
            })
            ->editColumn('quantity', function (Measure $measure) {
                $product = $measure->products()->first();

                return $product->pivot->quantity;
            })
            ->editColumn('sale_price', function (Measure $measure) {
                $product = $measure->products()->first();

                return $product->pivot->sale_price;
            })
            ->editColumn('updated_at', function (Measure $measure) {
                return $measure->updated_at->format('d M Y');
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
        $query = Measure::with('products');

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
            //'id',
            'title'       => ['title' => 'Titulo'],
            'sale_price'  => ['orderable' => false, 'searchable' => false, 'title' => 'Precio'],
            'quantity'    => ['orderable' => false, 'searchable' => false, 'title' => 'Cantidad'],
            'orientation' => ['title' => 'Orientación'],
            'measure'     => ['orderable' => false, 'searchable' => false, 'title' => 'Medidas'],
            //'updated_at'  => ['orderable' => false, 'searchable' => false, 'title' => 'Ultima actualización'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'productsMeasure_' . time();
    }
}
