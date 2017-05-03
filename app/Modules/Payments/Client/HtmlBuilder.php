<?php

namespace App\Modules\Payments\Client;

use App\Modules\Shop\Orders\Order;

class HtmlBuilder
{
    /**
     * Panel DataTables
     * 
     * @return array
     */
    
    public function dataTablePanelIndex()
    {
        return [

            'data-name'  => 'money',

            'title'      => 'Lista de Pagos',

            'button-actions' => [

                [
                    'data-name'   => 'plus-alt',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Nuevo',

                    'buttonId'    => 'button_create',
                ],
            ]            
        ];
    }

    /**
     * Form actions for buttons DataTables
     *
     * @param \App\Modules\Shop\Orders\Order $order
     *
     * @return array
     */
    
    public function dataTableMultipleFormActions(Order $order)
    {
        return [

            [
                'route'     => 'payments.client.create',
                'parameter' => $order->id,
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
        ];
    }

    /**
     * Form Builder
     *
     * @param \App\Modules\Shop\Orders\Order $order
     * @param array $banks
     * @param array $methods
     * @return array
     */
    
    public function formBuilder(Order $order, array $banks, array $methods)
    {
        return [

            'inputs' => [

                [
                    'col_md' => 'col-md-6',

                    'elements' => [
                        [
                            'type'     => 'select',
                            'name'     => 'bank_id',
                            'list'     => $banks,
                            'multiple' => false,
                            'required' => true,
                        ],
                        [
                            'type'     => 'select',
                            'name'     => 'method_id',
                            'list'     => $methods,
                            'multiple' => false,
                            'required' => true,
                        ],
                    ],
                ],

                [
                    'col_md' => 'col-md-6',

                    'elements' => [
                        [
                            'type'     => 'text',
                            'name'     => 'amount',
                            'max'      => 10,
                            'required' => true,
                        ],
                        [
                            'type'     => 'text',
                            'name'     => 'reference',
                            'max'      => 100,
                            'required' => true,
                        ],
                    ],
                ],

                [
                    'col_md' => 'col-md-12',

                    'elements' => [

                        [
                            'type'     => 'hidden',
                            'name'     => 'order_id',
                            'value'    => $order->id,
                            //'class'    => '',
                        ],
                    ],
                ],

                /*
                [
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type'     => 'file',
                            'category' => 'single',
                            'name'     => 'file_1',
                        ],
                    ],
                ],
                */
                
            ],

            'submit' => [

                //'value' => 'Actualizar',
            ],

        ];
    }


    /**
     *  Breadcrumb Menu
     * 
     * @return array
     */
    
    public function breadcrumbIndex()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Mis Ordenes',

                    'url'         => route('web.orders.home'),
                ],
                [
                    'title' => 'Pagos',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Pagos',

                'data-name' => 'money',
            ]
            
        ];
    }
    
    public function breadcrumbCreate(Order $order)
    {
        return [

            'menu' => [

                [
                    'title'       => 'Mis Ordenes',

                    'url'         => route('web.orders.home'),
                ],
                [
                    'title'       => 'Pagos',

                    'url'         => route('payments.client.home', [$order->id]),
                ],
                [
                    'title'       => 'Nuevo',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Nuevo',

                'data-name' => 'money',
            ]
        ];
    }

}