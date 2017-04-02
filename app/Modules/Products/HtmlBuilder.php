<?php

namespace App\Modules\Products;

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

            'title'      => 'Lista de Productos',

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
                    'data-name'   => 'image',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Administrar Vistas',

                    'buttonId'    => 'button_show',
                ],
                [
                    'data-name'   => 'image',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Cargar Vistas',

                    'buttonId'    => 'button_load',
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
                'route'     => 'products.store.create',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            [
                'route'     => 'products.store.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            [
                'route'     => 'products.store.show',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_show',
            ],
            [
                'route'     => 'products.store.load',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_load',
            ],
            [
                'route'     => 'products.store.publish',
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
                'route'     => 'products.store.draft',
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
                'route'     => 'products.store.destroy',
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
     * @param array $categories
     * 
     * @return array
     */
    
    public function formBuilder(array $categories)
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

                [
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type'     => 'select',
                            'name'     => 'category_id',
                            'list'     => $categories,
                            'multiple' => false,
                            'required' => true,
                        ],
                    ],
                ],
                
                    /*
                [
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type'     => 'file',
                            'category' => 'single',
                            'name'     => 'gallery_imagen',
                        ],
                    ],
                ],
                */
                
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
                    'title' => 'Productos',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Productos',

                'data-name' => 'image',
            ]
            
        ];
    }
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => 'Crear nuevo Producto',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Crear nuevo Producto',

                'data-name' => 'image',
            ]
        ];
    }
    
    public function breadcrumbEdit()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => 'Editar Producto',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar Producto',

                'data-name' => 'image',
            ]
        ];
    }

}