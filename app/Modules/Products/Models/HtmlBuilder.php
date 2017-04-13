<?php

namespace App\Modules\Products\Models;

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
                [
                    'data-name'   => 'edit',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Actualizar',

                    'buttonId'    => 'button_edit',
                ],
                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Publicar',

                    'buttonId'    => 'button_publish',
                ],
                [
                    'data-name'   => 'eye-close',

                    'buttonClass' => 'btn-warning',

                    'buttonTitle' => 'Ocultar',

                    'buttonId'    => 'button_draft',
                ],
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
                /*
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
                */
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
                'route'     => 'products.model.create',
                'parameter' => $product->id,
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            [
                'route'     => 'products.model.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            [
                'route'     => 'products.model.show',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_show',
            ],
            [
                'route'     => 'products.model.publish',
                'parameter' => '',
                'method'    => 'POST',
                'id'        => 'form_publish',
                'inputs'    => [
                    [
                        'name'  => 'publish_ids',
                        'id'    => 'publish_ids',
                    ],
                ],
            ],
            [
                'route'     => 'products.model.draft',
                'parameter' => '',
                'method'    => 'POST',
                'id'        => 'form_draft',
                'inputs'    => [
                    [
                        'name'  => 'draft_ids',
                        'id'    => 'draft_ids',
                    ],
                ],
            ],
            [
                'route'     => 'products.model.destroy',
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
     * @param \App\Modules\Products\Models\ProductModel $productModel
     * 
     * @return array
     */
    
    public function dataTableMultipleFormActionsDesigner(ProductModel $productModel)
    {
        return [
            
            [
                'route'     => 'products.model.save',
                'parameter' => $productModel->id,
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
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type'     => 'text',
                            'name'     => 'title',
                            'max'      => 100,
                            'required' => true,
                        ],

                        /*
                        [
                            'type'     => 'select',
                            'name'     => 'view',
                            'list'     => ['front' => 'Vista de Frente', 'back' => 'Vista de Espalda'],
                            'multiple' => false,
                            'required' => true,
                        ],
                        */
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
     * @param \App\Modules\Products\Product $product
     * 
     * @return array
     */
    
    public function breadcrumbIndex(Product $product)
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title' => "Modelos del Producto: {$product->title}",

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => "Modelos del Producto: {$product->title}",

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
                    'title'       => "Modelos del Producto: {$product->title}",

                    'url'         => route('products.model.home', [$product]),
                ],
                [
                    'title'       => "Nuevo Modelo del Producto: {$product->title}",

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => "Nuevo Modelo del Producto: {$product->title}",

                'data-name' => 'image',
            ]
        ];
    }


    /**
     * @param \App\Modules\Products\Models\ProductModel $productModel
     *
     * @return array
     */

    public function breadcrumbEdit(ProductModel $productModel)
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => "Modelos del Producto: {$productModel->product->title}",

                    'url'         => route('products.model.home', [$productModel->product->id]),
                ],
                [
                    'title'       => "Actualizar Modelo: {$productModel->title}",

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => "Actualizar Modelo: {$productModel->title}",

                'data-name' => 'image',
            ]
        ];
    }


    /**
     * @param \App\Modules\Products\Models\ProductModel $productModel
     * 
     * @return array
     */
    public function breadcrumbDesigner(ProductModel $productModel)
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => "Modelos del Producto: {$productModel->product->title}",

                    'url'         => route('products.model.home', [$productModel->product]),
                ],
                [
                    'title'       => "Diseño del Producto: {$productModel->title}",

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => "Diseño del Producto: {$productModel->title}",

                'data-name' => 'image',
            ]
        ];
    }

}