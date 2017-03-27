@if(isset($attributes))

    {!! Form::model(

        isset($attributes['model']) ? $attributes['model'] ? $attributes['model'] : null : null,

        [
            'route'  => [
                            isset($attributes['route']) ? $attributes['route'] ? $attributes['route'] : '' : '',

                            isset($attributes['model']) ? $attributes['model'] ? $attributes['model'] : null : null
                        ],

            'method' => isset($attributes['method']) ? $attributes['method'] ? $attributes['method'] : 'PUT' : 'PUT',

            'id'     => isset($attributes['id']) ? $attributes['id'] ? $attributes['id'] : 'form' : 'form',

            'files'  => $attributes['files'],

            'class'  => $attributes['class'],

        ]

    ) !!}


    @include('layouts.builder.components.html.input.inputs')

    {!! Form::Close() !!}

    @else

    No a definido la llave "attibutes" con la ruta "route" del formulario

@endif