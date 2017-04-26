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
                    'data-name'   => 'thumbnails-big',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Gestionar Modelos de Producto',

                    'buttonId'    => 'button_show',
                ],
                [
                    'data-name'   => 'albums',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Ver modelos del producto',

                    'buttonId'    => 'button_load',
                ],
                [
                    'data-name'   => 'resize-horizontal-alt',

                    'buttonClass' => 'btn-primary',

                    'buttonTitle' => 'Ver Medidas del producto',

                    'buttonId'    => 'button_redirect',
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
     * Panel DataTables
     *
     * @return array
     */

    public function buttonsDesigner()
    {
        return [

            'data-name'  => 'image',

            'title'      => 'Modelos base del Producto',

            'button-actions' => [

                /*
                [
                    'data-name'   => 'save',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Guardar variación del producto',

                    'buttonId'    => 'fpd_button_create_',
                ],

                [
                    'data-name'   => 'eye-open',

                    'buttonClass' => 'btn-warning',

                    'buttonTitle' => 'Mostrar Parámetros',

                    'buttonId'    => 'fpd_button_parameters',
                ],
                */
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
                'route'     => 'products.measure.home',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_redirect',
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

    public function multipleFormActionsDesigner()
    {
        return [

            [
                'route'     => 'products.model.save',
                'parameter' => '',
                'method'    => 'POST',
                'id'        => 'fpd_form_save_model',
                'inputs'    => [

                    [
                        'name'  => 'fpd-layers',
                        //'value' => 'value',
                        'id'    => 'fpd-layers',
                    ],

                ]
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
                    'col_md' => 'col-md-4',

                    'elements' => [
                        [
                            'type'     => 'text',
                            'name'     => 'title',
                            'max'      => 100,
                            'required' => true,
                        ],
                        [
                            'type'     => 'text',
                            'name'     => 'unit_price',
                            'max'      => 10,
                            'required' => true,
                        ],
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

    /**
     * @return array
     */
    public function breadcrumbDesigner()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Productos',

                    'url'         => route('products.store.home'),
                ],
                [
                    'title'       => 'Modelos del Producto',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Modelos del Producto',

                'data-name' => 'image',
            ]
        ];
    }

}