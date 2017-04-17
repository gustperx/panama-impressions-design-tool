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

            'data-name'  => 'inbox',

            'title'      => 'Ordenes',

            'button-actions' => [
                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Publicar',

                    'buttonId'    => 'button_show',
                ],

                [
                    'data-name'   => 'check',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Aprobar',

                    'buttonId'    => 'button_shop_approved',
                ],

                [
                    'data-name'   => 'printer',

                    'buttonClass' => 'btn-warning',

                    'buttonTitle' => 'Procesar',

                    'buttonId'    => 'button_shop_process',
                ],

                [
                    'data-name'   => 'file-export',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Enviar al Cliente',

                    'buttonId'    => 'button_shop_send',
                ],

                [
                    'data-name'   => 'checked-on',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Recibido por el Cliente',

                    'buttonId'    => 'button_shop_received',
                ],

                [
                    'data-name'   => 'remove',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Eliminar',

                    'buttonId'    => 'button_shop_cancel',
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
                'route'     => 'web.orders.show',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_show',
            ],
            [
                'route'     => 'orders.admin.approved',
                'parameter' => ':RECORD_ID',
                'method'    => 'POST',
                'id'        => 'form_shop_approved',
            ],
            [
                'route'     => 'orders.admin.process',
                'parameter' => ':RECORD_ID',
                'method'    => 'POST',
                'id'        => 'form_shop_process',
            ],
            [
                'route'     => 'orders.admin.send',
                'parameter' => ':RECORD_ID',
                'method'    => 'POST',
                'id'        => 'form_shop_send',
            ],
            [
                'route'     => 'orders.admin.received',
                'parameter' => ':RECORD_ID',
                'method'    => 'POST',
                'id'        => 'form_shop_received',
            ],
            [
                'route'     => 'orders.admin.cancel',
                'parameter' => ':RECORD_ID',
                'method'    => 'POST',
                'id'        => 'form_shop_cancel',
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
                    'title' => 'Ordenes',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Ordenes',

                'data-name' => 'inbox',
            ]
            
        ];
    }

}