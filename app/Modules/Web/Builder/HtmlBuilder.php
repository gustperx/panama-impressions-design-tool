<?php

namespace App\Modules\Web\Builder;

class HtmlBuilder
{
    /**
     * @return array
     */
    public function breadcrumbProducts()
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

    public function breadcrumbContact()
    {
        return [

            'menu' => [

                [
                    'title' => 'Contacto',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Contacto',

                'data-name' => 'image',
            ]

        ];
    }

    public function breadcrumbFaq()
    {
        return [

            'menu' => [

                [
                    'title' => 'FAQ',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'FAQ',

                'data-name' => 'image',
            ]

        ];
    }

    public function breadcrumbAccount()
    {
        return [

            'menu' => [

                [
                    'title' => 'Mi Cuenta',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Mi Cuenta',

                'data-name' => 'image',
            ]

        ];
    }

    public function breadcrumbCar()
    {
        return [

            'menu' => [

                [
                    'title' => 'Carrito de Compras',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Carrito de Compras',

                'data-name' => 'image',
            ]

        ];
    }

    public function breadcrumbOrder()
    {
        return [

            'menu' => [

                [
                    'title' => 'Mis Ordenes',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Mis Ordenes',

                'data-name' => 'image',
            ]

        ];
    }

    public function breadcrumbPanel()
    {
        return [

            'menu' => [

                [
                    'title' => 'Panel',

                    'url'   => null,
                ],
            ],

            'currentPage' => [

                'title'     => 'Panel',

                'data-name' => 'image',
            ]

        ];
    }

}