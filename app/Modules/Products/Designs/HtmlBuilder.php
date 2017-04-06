<?php

namespace App\Modules\Products\Designs;

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

            'title'      => 'Lista de Diseños',

            'button-actions' => [

                [
                    'data-name'   => 'upload-alt',

                    'buttonClass' => 'btn-success',

                    'buttonTitle' => 'Cargar Diseños',

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
                    'data-name'   => 'remove',

                    'buttonClass' => 'btn-danger',

                    'buttonTitle' => 'Eliminar Diseños',

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
                'route'     => 'products.design.create',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            /*
            [
                'route'     => 'products.design.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            */
            [
                'route'     => 'products.design.destroy',
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
                    'col_md' => 'col-md-6',

                    'elements' => [
                        [
                            'type'     => 'text',
                            'name'     => 'title',
                            'max'      => 100,
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

                [
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type'     => 'file',
                            'category' => 'single',
                            'name'     => 'source',
                        ],
                    ],
                ],
                
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
                    'title' => 'Diseños',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Diseños',

                'data-name' => 'image',
            ]
            
        ];
    }
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Diseños',

                    'url'         => route('products.design.home'),
                ],
                [
                    'title'       => 'Cargar Diseños',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Cargar Diseños',

                'data-name' => 'image',
            ]
        ];
    }
    
    public function breadcrumbEdit()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Diseños',

                    'url'         => route('products.design.home'),
                ],
                [
                    'title'       => 'Editar Diseños',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar Diseños',

                'data-name' => 'image',
            ]
        ];
    }

}