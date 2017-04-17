<?php

namespace App\Modules\Shop\Builder\Designer;

use App\Modules\Products\Models\ProductModel;
use App\Modules\Shop\Orders\OrderDetail;

class HtmlBuilder
{
    /**
     * Panel DataTables
     *
     * @param OrderDetail $orderDetail
     * @return array
     */

    public function buttonsDesigner(OrderDetail $orderDetail)
    {
        if($orderDetail->order->status == 1) {

            $buttons = [

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

                        'buttonTitle' => 'Cargar Diseño',

                        'buttonId'    => 'fpd_button_load',
                    ],
                ]
            ];

        } else {

            $buttons = [

                'data-name'  => 'image',

                'title'      => 'Modelo base del Producto',

                'button-actions' => [
                    [
                        'data-name'   => 'upload',

                        'buttonClass' => 'btn-primary',

                        'buttonTitle' => 'Cargar Diseño',

                        'buttonId'    => 'fpd_button_load',
                    ],
                ]
            ];

        }

        return $buttons;
    }

    /**
     * Form actions for buttons Fancy products designer
     *
     * @param \App\Modules\Shop\Orders\OrderDetail $orderDetail
     *
     * @return array
     */
    
    public function dataTableMultipleFormActionsDesigner(OrderDetail $orderDetail)
    {
        return [
            
            [
                'route'     => 'web.car.designer.save',
                'parameter' => $orderDetail->id,
                'method'    => 'POST',
                'id'        => 'fpd_form_save_product_variation',
                'inputs'    => [

                    [
                        'name'  => 'fpd-product-variation',
                        //'value' => '',
                        'id'    => 'fpd-product-variation',
                    ],

                ]
            ],
            
            [
                'route'     => 'web.car.designer.load',
                'parameter' => $orderDetail->id,
                'method'    => 'POST',
                'id'        => 'fpd_form_load_product_variation',
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
                    'title'       => 'Carrito de Compras',

                    'url'         => route('web.car.home'),
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