<?php

namespace App\DataTables\Panel\Products;

use App\DataTables\GustperxDataTables;
use App\Modules\Products\Categories\Category;

class CategoryDataTable extends GustperxDataTables
{
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
            'title',
            'created_at',
            'updated_at',
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
