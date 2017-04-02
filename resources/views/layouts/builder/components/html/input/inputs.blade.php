@if(isset($form['inputs']))

    @foreach($form['inputs'] as $input_row)

        <div class="col-md-12">

            @if(isset($input_row['elements']))

                @foreach($input_row['elements'] as $input)

                    <div class="form-group {{ isset($input_row['col_md']) ? $input_row['col_md'] ? $input_row['col_md'] : 'col-md-6' : 'col-md-6' }}">

                        @if(isset($input['type']))

                            @if(($input['type'] == 'text') || ($input['type'] == 'email') || ($input['type'] == 'number'))

                                @include('layouts.builder.components.html.input.partials.input_type_text')

                            @elseif(($input['type'] == 'hidden'))

                                @include('layouts.builder.components.html.input.partials.input_type_hidden')

                            @elseif(($input['type'] == 'select'))

                                @include('layouts.builder.components.html.input.partials.input_type_select')

                            @elseif(($input['type'] == 'textarea'))

                                @include('layouts.builder.components.html.input.partials.input_type_textarea')

                            @elseif(($input['type'] == 'password'))

                                @include('layouts.builder.components.html.input.partials.input_type_password')

                            @elseif(($input['type'] == 'checkbox'))

                                @include('layouts.builder.components.html.input.partials.input_type_checkbox')

                            @elseif(($input['type'] == 'file'))

                                @include('layouts.builder.components.html.input.partials.input_type_file')

                            @else

                                input no definido: {{ $input['type'] }}

                            @endif

                        @else

                            Debe definir el tipo de input y sus elementos

                        @endif

                    </div>

                @endforeach

            @else

                Debe definir la llave "elements" con el array de controles del formulario

            @endif

        </div>

    @endforeach

        <div class="col-md-12">

            <div class="form-group" align="right">

                @if(isset($form['submit']))

                    {!! Form::submit(

                        isset($form['submit']['value']) ? $form['submit']['value'] ? $form['submit']['value'] : 'Procesar' : 'Procesar',

                        [
                            'class' => isset($form['submit']['class']) ? $form['submit']['class'] ? $form['submit']['class'] : 'btn btn-primary' : 'btn btn-primary',
                        ]
                    )

                    !!}

                    @else

                    No a definido la llave "$form['submit']" con los atributos del boton

                @endif

            </div>

        </div>

    @else

    No a definido la llave "inputs" con el array de elementos del formulario

@endif