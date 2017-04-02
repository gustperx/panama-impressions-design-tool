<?php

namespace App\Modules\Products\Categories;

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

            'title'      => 'Lista de Categorías',

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
                'route'     => 'products.categories.create',
                'parameter' => '',
                'method'    => 'GET',
                'id'        => 'form_create',
            ],
            [
                'route'     => 'products.categories.edit',
                'parameter' => ':RECORD_ID',
                'method'    => 'GET',
                'id'        => 'form_edit',
            ],
            [
                'route'     => 'products.categories.destroy',
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
                    'title' => 'Categorías',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Lista de Categorías',

                'data-name' => 'image',
            ]
            
        ];
    }
    
    public function breadcrumbCreate()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Categorías',

                    'url'         => route('products.categories.home'),
                ],
                [
                    'title'       => 'Crear nueva Categoría',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Crear nueva Categoría',

                'data-name' => 'image',
            ]
        ];
    }
    
    public function breadcrumbEdit()
    {
        return [

            'menu' => [

                [
                    'title'       => 'Categorías',

                    'url'         => route('products.categories.home'),
                ],
                [
                    'title'       => 'Editar Categoría',

                    'url'         => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Editar Categoría',

                'data-name' => 'image',
            ]
        ];
    }

}