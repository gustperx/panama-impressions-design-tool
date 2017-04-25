<?php

namespace App\Modules\Products\Measures;

use App\Modules\Products\Product;

class HtmlBuilder
{
    /**
     * Panel DataTables
     *
     * @param \App\Modules\Products\Product $product
     * 
     * @return array
     */
    
    public function dataTablePanelIndex(Product $product)
    {
        return [

            'data-name'  => 'resize-horizontal-alt',

            'title'      => "Medidas del Producto {$product->title}",

            'button-actions' => [

                [
                    'data-name'   => 'plus-alt',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Nuevo',

                    'buttonId'    => 'button_create',
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
                'route'     => 'products.measure.create',
                'parameter' => $product->id,
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            [
                'route'     => 'products.measure.destroy',
                'parameter' => $product->id,
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
     * @param array $measures
     *
     * @return array
     */
    
    public function formBuilder(Product $product, array $measures)
    {
        return [

            'inputs' => [

                [
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type'     => 'select',
                            'name'     => 'measure_id',
                            'list'     => $measures,
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
                            'name'     => 'sale_price',
                            'max'      => 10,
                            'required' => true,
                        ],
                        [
                            'type'     => 'text',
                            'name'     => 'quantity',
                            'max'      => 10,
                            'required' => true,
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
     * @param \App\Modules\Products\Product $product
     *
     * @return array
     */
    
    public function breadcrumbIndex(Product $product)
    {
        return [

            'menu' => [

                [
                    'title' => 'Productos',

                    'url'   => route('products.store.home'),
                ],
                [
                    'title' => 'Medidas',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => "Medidas del Producto {$product->title}",

                'data-name' => 'resize-horizontal-alt',
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
                    'title' => 'Productos',

                    'url'   => route('products.store.home'),
                ],
                [
                    'title'       => "Medidas del Producto {$product->title}",

                    'url'         => route('products.measure.home', [$product->id]),
                ],
                [
                    'title'       => 'Agregar Medida',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Agregar Medida',

                'data-name' => 'resize-horizontal-alt',
            ]
        ];
    }

}