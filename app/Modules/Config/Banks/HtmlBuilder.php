<?php

namespace App\Modules\Config\Banks;

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

            'data-name'  => 'piggybank',

            'title'      => 'Lista de Bancos',

            'button-actions' => [

                [
                    'data-name'   => 'plus-alt',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Nuevo',

                    'buttonId'    => 'button_create',
                ],
                [
                    'data-name'   => 'edit',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Actualizar',

                    'buttonId'    => 'button_edit',
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
                'route'     => 'config.bank.create',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            [
                'route'     => 'config.bank.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            [
                'route'     => 'config.bank.destroy',
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
     * @param array $types
     * 
     * @return array
     */
    
    public function formBuilder(array $types)
    {
        return [

            'inputs' => [

                [
                    'col_md' => 'col-md-4',

                    'elements' => [
                        [
                            'type'     => 'text',
                            'name'     => 'name',
                            'max'      => 100,
                            'required' => true,
                        ],
                        [
                            'type'     => 'text',
                            'name'     => 'code',
                            'max'      => 100,
                            'required' => true,
                        ],
                        [
                            'type'     => 'select',
                            'name'     => 'account',
                            'list'     => $types,
                            'multiple' => false,
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
                    'title' => 'Bancos',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Bancos',

                'data-name' => 'piggybank',
            ]
            
        ];
    }
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Bancos',

                    'url'         => route('config.bank.home'),
                ],
                [
                    'title'       => 'Nuevo',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Nuevo',

                'data-name' => 'piggybank',
            ]
        ];
    }
    
    public function breadcrumbEdit()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Bancos',

                    'url'         => route('config.bank.home'),
                ],
                [
                    'title'       => 'Editar',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar',

                'data-name' => 'piggybank',
            ]
        ];
    }

}