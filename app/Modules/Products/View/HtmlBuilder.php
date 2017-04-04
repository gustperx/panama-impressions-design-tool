<?php

namespace App\Modules\Products\View;

use App\Modules\Products\Designs\ProductView;
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

            'title'      => 'Modelos de Producto',

            'button-actions' => [

                [
                    'data-name'   => 'plus-alt',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Crear modelo de producto',

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
                    'data-name'   => 'new-window',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Gestionar capas del producto',

                    'buttonId'    => 'button_show',
                ],
                [
                    'data-name'   => 'remove',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Eliminar modelo de producto',

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

            'title'      => 'Modelo base del Producto',

            'button-actions' => [

                [
                    'data-name'   => 'save',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Guardar Modelo',

                    'buttonId'    => 'fpd_button_create',
                ],
                [
                    'data-name'   => 'upload',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Cargar Modelo',

                    'buttonId'    => 'fpd_button_load',
                ],

                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-warning',

                    'buttonTitle' => 'Mostrar Parámetros',

                    'buttonId'    => 'fpd_button_parameters',
                ],

                [
                    'data-name'   => 'remove',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Borrar Modelo',

                    'buttonId'    => 'fpd_button_destroy',
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
     * Form actions for buttons Fancy products designer
     *
     * @param \App\Modules\Products\Designs\ProductView $productView
     * 
     * @return array
     */
    
    public function dataTableMultipleFormActionsDesigner(ProductView $productView)
    {
        return [
            
            [
                'route'     => 'products.view.save',
                'parameter' => $productView->id,
                'method'    => 'POST',
                'id'        => 'fpd_form_save_model',
                'inputs'    => [

                    [
                        'name'  => 'fpd-layers',
                        //'value' => '',
                        'id'    => 'fpd-layers',
                    ],

                ]
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
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title' => 'Modelos de Producto',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Modelos de Producto',

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
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
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
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
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

    /**
     * @param \App\Modules\Products\Product $product
     *
     * @return array
     */
    public function breadcrumbDesigner(Product $product)
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => 'Vistas del Producto',

                    'url'         => route('products.view.home', [$product]),
                ],
                [
                    'title'       => 'Creación de modelo base del producto',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Creación de modelo base del producto',

                'data-name' => 'image',
            ]
        ];
    }

}