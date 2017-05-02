<?php

namespace App\Modules\Payments\Admin;

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
                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Detalles',

                    'buttonId'    => 'button_redirect',
                ],
            ]            
        ];
    }

    /**
     * Form actions for buttons DataTables
     * 
     * @return array
     */
    
    public function dataTableMultipleFormActions()
    {
        return [

            [
                'route'     => 'payments.admin.create',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            [
                'route'     => 'payments.admin.show',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_redirect',
            ],
        ];
    }

    /**
     * Form Builder
     *
     * @param array $orders
     * @param array $banks
     * @param array $methods
     * @return array
     */
    
    public function formBuilder(array $orders, array $banks, array $methods)
    {
        return [

            'inputs' => [

                [
                    'col_md' => 'col-md-4',

                    'elements' => [
                        [
                            'type'     => 'select',
                            'name'     => 'order_id',
                            'list'     => $orders,
                            'multiple' => false,
                            'required' => true,
                        ],
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
                            'type'     => 'file',
                            'category' => 'single',
                            'name'     => 'file_1',
                        ],
                    ],
                ],
                
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
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Pagos',

                    'url'         => route('payments.admin.home'),
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