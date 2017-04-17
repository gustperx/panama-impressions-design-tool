<?php

namespace App\Modules\Shop\Builder\Orders\Admin;

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

            'data-name'  => 'image',

            'title'      => 'Mis Ordenes',

            'button-actions' => [
                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Publicar',

                    'buttonId'    => 'button_publish',
                ],
                [
                    'data-name'   => 'remove',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Eliminar',

                    'buttonId'    => 'button_destroy',
                ],
            ]            
        ];
    }

    /**
     * Panel DataTables
     *
     * @return array
     */

    public function buttonsDesigner()
    {
        return [

            'data-name'  => 'image',

            'title'      => 'Modelos base del Producto',

            'button-actions' => [

                /*
                [
                    'data-name'   => 'save',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Guardar variación del producto',

                    'buttonId'    => 'fpd_button_create_',
                ],

                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-warning',

                    'buttonTitle' => 'Mostrar Parámetros',

                    'buttonId'    => 'fpd_button_parameters',
                ],
                */
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
                'route'     => 'products.store.show',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_show',
            ],
            [
                'route'     => 'products.store.destroy',
                'parameter' => '',
                'method'    => 'DELETE',
                'id'        => 'form_destroy',
                'inputs'    => [
                    [
                        'name'  => 'destroy_ids',
                        'id'    => 'destroy_ids',
                    ],
                ],
            ],
        ];
    }

    public function multipleFormActionsDesigner()
    {
        return [

            [
                'route'     => 'products.model.save',
                'parameter' => '',
                'method'    => 'POST',
                'id'        => 'fpd_form_save_model',
                'inputs'    => [

                    [
                        'name'  => 'fpd-layers',
                        //'value' => 'value',
                        'id'    => 'fpd-layers',
                    ],

                ]
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
                    'title' => 'Productos',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Productos',

                'data-name' => 'image',
            ]
            
        ];
    }
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => 'Crear nuevo Producto',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Crear nuevo Producto',

                'data-name' => 'image',
            ]
        ];
    }
    
    public function breadcrumbEdit()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => 'Editar Producto',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar Producto',

                'data-name' => 'image',
            ]
        ];
    }

    /**
     * @return array
     */
    public function breadcrumbDesigner()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => 'Modelos del Producto',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Modelos del Producto',

                'data-name' => 'image',
            ]
        ];
    }

}