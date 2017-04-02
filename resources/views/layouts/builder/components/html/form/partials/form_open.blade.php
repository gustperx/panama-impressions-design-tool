@if(isset($attributes))

    {!! Form::open([

    'route'  => [
                    isset($attributes['route']) ? $attributes['route'] ? $attributes['route'] : '' : '',

                    isset($attributes['parameter']) ? $attributes['parameter'] ? $attributes['parameter'] : '' : '',
                ],

    'method' => isset($attributes['method']) ? $attributes['method'] ? $attributes['method'] : 'POST' : 'POST',

    'id'     => isset($attributes['id']) ? $attributes['id'] ? $attributes['id'] : 'form' : 'form',

    'files'  => $attributes['files'],

    'class'  => $attributes['class'],

    ]) !!}


    @include('layouts.builder.components.html.input.inputs')

    {!! Form::Close() !!}

    @else

    No a definido la llave "attibutes" con la ruta "route" del formulario

@endif