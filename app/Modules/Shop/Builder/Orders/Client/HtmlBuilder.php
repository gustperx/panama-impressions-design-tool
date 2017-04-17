<?php

namespace App\Modules\Shop\Builder\Orders\Client;

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

            'title'      => 'Mis Ordenes',

            'button-actions' => [
                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Publicar',

                    'buttonId'    => 'button_show',
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
                'route'     => 'web.orders.destroy',
                'parameter' => ':RECORD_ID',
                'method'    => 'DELETE',
                'id'        => 'form_shop_cancel',
            ],
        ];
    }

}