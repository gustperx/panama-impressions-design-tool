<?php

namespace App\Modules\Auth;

class ClientHtmlBuilder
{
    /**
     * Panel DataTables
     * 
     * @return array
     */
    
    public function dataTablePanelIndex()
    {
        return [

            'data-name'  => 'users',

            'title'      => 'Lista de Clientes',

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
                    'data-name'   => 'user-flag',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Permitir acceso a la plataforma',

                    'buttonId'    => 'button_permitted',
                ],
                [
                    'data-name'   => 'user-ban',

                    'buttonClass' => 'btn-warning',

                    'buttonTitle' => 'Bloquear acceso a la plataforma',

                    'buttonId'    => 'button_banned',
                ],
                [
                    'data-name'   => 'trash',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Mover a la Papelera',

                    'buttonId'    => 'button_trash',
                ],
                [
                    'data-name'   => 'recycled',

                    'buttonClass' => 'btn-info',

                    'buttonTitle' => 'Ver registros en papelera',

                    'buttonId'    => 'button_recycled',
                ],
            ]            
        ];
    }


    public function dataTablePanelTrash()
    {
        return [

            'data-name'  => 'users',

            'title'      => 'Lista de Clientes',

            'button-actions' => [

                [
                    'data-name'   => 'remove',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Eliminar',

                    'buttonId'    => 'button_destroy',
                ],
                [
                    'data-name'   => 'refresh',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Restaurar',

                    'buttonId'    => 'button_restore',
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
                'route'     => 'users.client.create',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            [
                'route'     => 'users.client.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            [
                'route'     => 'users.client.banned',
                'parameter' => '',
                'method'    => 'POST',
                'id'        => 'form_banned',
                'inputs'    => [

                    [
                        'name'  => 'banned_ids',
                        'id'    => 'banned_ids',
                    ],
                ],
            ],
            [
                'route'     => 'users.client.permitted',
                'parameter' => '',
                'method'    => 'POST',
                'id'        => 'form_permitted',
                'inputs'    => [

                    [
                        'name'  => 'permitted_ids',
                        'id'    => 'permitted_ids',
                    ],
                ],
            ],
            [
                'route'     => 'users.client.trash',
                'parameter' => '',
                'method'    => 'DELETE',
                'id'        => 'form_thash',
                'inputs'    => [

                    [
                        'name'  => 'trash_ids',
                        'id'    => 'trash_ids',
                    ],
                ],
            ],
            [
                'route'     => 'users.client.recycled',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_recycled',
            ],
        ];
    }


    public function dataTableMultipleFormActionsTrash()
    {
        return [

            [
                'route'     => 'users.client.destroy',
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

            [
                'route'     => 'users.client.restore',
                'parameter' => '',
                'method'    => 'POST',
                'id'        => 'form_restore',
                'inputs'    => [

                    [
                        'name'  => 'restore_ids',
                        'id'    => 'restore_ids',
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
                    'col_md' => 'col-md-6',

                    'elements' => [

                        [
                            'type'     => 'text',
                            'name'     => 'first_name',
                            'max'      => 30,
                            'required' => true,
                        ],
                        [
                            'type'     => 'text',
                            'name'     => 'last_name',
                            'max'      => 30,
                            'required' => true,
                        ],
                    ],
                ],

                [
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type' => 'text',
                            'name' => 'email',
                            'max'  => 60,
                            'required' => true,
                        ],
                    ],
                ],
                /*
                [
                    'col_md' => 'col-md-6',

                    'elements' => [

                        [
                            'type'     => 'password',
                            'name'     => 'password',
                            'max'      => 20,
                            'required' => true,
                        ],
                        [
                            'type'     => 'password',
                            'name'     => 'password_confirmation',
                            'max'      => 20,
                            'required' => true,
                        ],
                    ],
                ],
                */

            ],

            'submit' => [

                //'value' => 'Crear Cliente',
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
                    'title' => 'Clientes',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Clientes',

                'data-name' => 'users',
            ]
            
        ];
    }
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Clientes',

                    'url'         => route('users.client.home'),
                ],
                [
                    'title'       => 'Crear nuevo Cliente',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Crear nuevo Cliente',

                'data-name' => 'user',
            ]
        ];
    }
    
    public function breadcrumbEdit()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Clientes',

                    'url'         => route('users.client.home'),
                ],
                [
                    'title'       => 'Editar Cliente',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar Cliente',

                'data-name' => 'user',
            ]
        ];
    }

    public function breadcrumbTrash()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Clientes',

                    'url'         => route('users.client.home'),
                ],
                [
                    'title'       => 'Clientes en la papelera',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Clientes en la papelera',

                'data-name' => 'users',
            ]
        ];
    }
    
}