<?php

namespace App\Modules\Products\View;

use App\Modules\Products\Product;

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

            'title'      => 'Vistas del Producto',

            'button-actions' => [

                [
                    'data-name'   => 'plus-alt',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Nuevo',

                    'buttonId'    => 'button_create',
                ],
                    /*
                [
                    'data-name'   => 'edit',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Actualizar',

                    'buttonId'    => 'button_edit',
                ],
                */
                [
                    'data-name'   => 'image',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Administrar Capas',

                    'buttonId'    => 'button_show',
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
     * Form actions for buttons DataTables
     *
     * @param \App\Modules\Products\Product $product
     * 
     * @return array
     */
    
    public function dataTableMultipleFormActions(Product $product)
    {
        return [

            [
                'route'     => 'products.view.create',
                'parameter' => $product->id,
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            /*
            [
                'route'     => 'products.view.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            */
            [
                'route'     => 'products.view.show',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_show',
            ],
            [
                'route'     => 'products.view.destroy',
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

    /**
     * Form Builder
     *
     * @param \App\Modules\Products\Product $product
     * 
     * @return array
     */
    
    public function formBuilder(Product $product)
    {
        return [

            'inputs' => [

                [
                    'col_md' => 'col-md-6',

                    'elements' => [
                        [
                            'type'     => 'text',
                            'name'     => 'title',
                            'max'      => 100,
                            'required' => true,
                        ],

                        [
                            'type'     => 'select',
                            'name'     => 'view',
                            'list'     => ['front' => 'Vista de Frente', 'back' => 'Vista de Espalda'],
                            'multiple' => false,
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
                            'name'     => 'thumbnail',
                        ],
                    ],
                ],
                
                [
                    'col_md' => 'col-md-12',

                    'elements' => [

                        [
                            'type'     => 'hidden',
                            'name'     => 'product_id',
                            'value'    => $product->id,
                            //'class'    => '',
                        ],
                    ],
                ],
                
            ],

            'submit' => [

                //'value' => 'Crear Usuario',
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
                    'title' => 'Vistas del Producto',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Vistas del Producto',

                'data-name' => 'image',
            ]
            
        ];
    }

    /**
     * @param \App\Modules\Products\Product $product
     * 
     * @return array
     */
    public function breadcrumbCreate(Product $product)
    {
        return [

            'menu' => [

                [
                    'title'       => 'Vistas del Producto',

                    'url'         => route('products.view.home', [$product]),
                ],
                [
                    'title'       => 'Crear nueva Vista',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Crear nueva Vista',

                'data-name' => 'image',
            ]
        ];
    }

    /**
     * @param \App\Modules\Products\Product $product
     *
     * @return array
     */
    public function breadcrumbEdit(Product $product)
    {
        return [

            'menu' => [

                [
                    'title'       => 'Vistas del Producto',

                    'url'         => route('products.view.home', [$product]),
                ],
                [
                    'title'       => 'Editar Vista',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar Vista',

                'data-name' => 'image',
            ]
        ];
    }

}