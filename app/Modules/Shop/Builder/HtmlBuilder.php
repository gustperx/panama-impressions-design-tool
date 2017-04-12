<?php

namespace App\Modules\Shop\Builder;

use App\Modules\Products\Models\ProductModel;
use App\Modules\Products\Product;

class HtmlBuilder
{
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
                */
                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-warning',

                    'buttonTitle' => 'Mostrar Parámetros',

                    'buttonId'    => 'fpd_button_parameters',
                ],
                /*
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