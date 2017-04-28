<?php

namespace App\Modules\Config\Methods;

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

            'data-name'  => 'credit-card',

            'title'      => 'Lista de Métodos de Pago',

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
     * @return array
     */
    
    public function dataTableMultipleFormActions()
    {
        return [

            [
                'route'     => 'config.method.create',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            /*
            [
                'route'     => 'config.method.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            */
            [
                'route'     => 'config.method.publish',
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
                'route'     => 'config.method.draft',
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
                'route'     => 'config.method.destroy',
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
     * @return array
     */
    
    public function formBuilder()
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
                    'title' => 'Métodos de Pago',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Métodos de Pago',

                'data-name' => 'credit-card',
            ]
            
        ];
    }
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Métodos de Pago',

                    'url'         => route('config.method.home'),
                ],
                [
                    'title'       => 'Nuevo',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Nuevo',

                'data-name' => 'credit-card',
            ]
        ];
    }
    
    public function breadcrumbEdit()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Métodos de Pago',

                    'url'         => route('config.method.home'),
                ],
                [
                    'title'       => 'Editar',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar',

                'data-name' => 'credit-card',
            ]
        ];
    }

}