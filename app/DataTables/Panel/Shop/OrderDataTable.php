<?php

namespace App\DataTables\Panel\Shop;

use App\DataTables\GustperxDataTables;
use App\Modules\Shop\Orders\Order;

class OrderDataTable extends GustperxDataTables
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
            ->editColumn('status', function (Order $order) {

                switch ($order->status) {

                    case 1:
                        
                        return "<span class='label label-sm label-default'>Carrito de Compras</span>";
                       
                        break;

                    case 2:

                        return "<span class='label label-sm label-default'>En espera de Aprobación</span>";
                        
                        break;

                    case 3:

                        return "<span class='label label-sm label-danger'>Cancelado</span>";
                        
                        break;

                    case 4:

                        return "<span class='label label-sm label-info'>Aprobado</span>";
                        
                        break;

                    case 5:

                        return "<span class='label label-sm label-warning'>En Fabricación</span>";
                        
                        break;

                    case 6:

                        return "<span class='label label-sm label-primary'>Enviado al Cliente</span>";

                        break;

                    case 7:

                        return "<span class='label label-sm label-success'>Entregado al Cliente</span>";

                        break;
                    default:

                        return "<span class='label label-sm label-error'>Error Estatus</span>";
                }

            })
            ->editColumn('client', function (Order $order) {

                return $order->user->fullname;

            })
            ->editColumn('created_at', function (Order $order) {
                return $order->created_at->format('d M Y');
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
        $query = Order::query()->with('details')->where('status', '!=', 1);

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
            'status'     => ['orderable' => false, 'searchable' => false, 'title' => 'Estatus' ],
            'client'     => ['orderable' => false, 'searchable' => false, 'title' => 'Cliente' ],
            'created_at' => ['orderable' => false, 'searchable' => false, 'title' => 'Creado'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'order_' . time();
    }
}
