<?php

namespace App\Modules\Config\Basic;

class HtmlBuilder
{
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
                            'name'     => 'name',
                            'max'      => 60,
                            'required' => true,
                        ],
                        [
                            'type'     => 'text',
                            'name'     => 'email',
                            'max'      => 60,
                            'required' => true,
                        ],
                    ],
                ],

                [
                    'col_md' => 'col-md-6',

                    'elements' => [

                        [
                            'type'     => 'text',
                            'name'     => 'phone_one',
                            'max'      => 30,
                            'required' => true,
                        ],
                        [
                            'type'     => 'text',
                            'name'     => 'phone_two',
                            'max'      => 30,
                            'required' => true,
                        ],
                    ],
                ],


            ],

            'submit' => [

                'value' => 'Actualizar',
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
                    'title' => 'Mi Condominio',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Mi Condominio',

                'data-name' => 'home',
            ]

        ];
    }
}