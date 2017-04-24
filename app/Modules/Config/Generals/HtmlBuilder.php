<?php

namespace App\Modules\Config\Generals;

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
                    'col_md' => 'col-md-12',

                    'elements' => [
                        [
                            'type'     => 'text',
                            'name'     => 'coin',
                            'max'      => 50,
                            'required' => true,
                        ],
                    ],
                ],

                [
                    'col_md' => 'col-md-12',

                    'elements' => [

                        [
                            'type'     => 'text',
                            'name'     => 'unit_measurement',
                            'max'      => 50,
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
                    'title' => 'Configuraciones Generales',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Configuraciones Generales',

                'data-name' => 'home',
            ]

        ];
    }
}