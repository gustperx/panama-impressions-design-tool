<?php

namespace App\DataTables\Panel\Configs\Measure;

use App\DataTables\GustperxDataTables;
use App\Modules\Config\Measures\Measure;
use Facades\App\Facades\Settings;

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
                return "{$measure->high} x {$measure->width} " . Settings::getGeneralConfig()->unit_measurement;
            })
            ->editColumn('product', function (Measure $measure) {
                return "<span class='label label-sm label-primary'>{$measure->products()->count()}</span>";
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
        $query = Measure::query();

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
            'title'       => ['title' => 'Titulo'],
            'orientation' => ['title' => 'Orientación'],
            'measure'     => ['orderable' => false, 'searchable' => false, 'title' => 'Medidas'],
            'product'     => ['title' => 'Productos'],
            'updated_at'  => ['orderable' => false, 'searchable' => false, 'title' => 'Ultima actualización'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'measure_' . time();
    }
}
