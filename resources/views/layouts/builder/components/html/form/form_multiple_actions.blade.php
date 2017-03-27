@if(isset($multiple_form_actions))

    @foreach($multiple_form_actions as $form_action)

        {!! Form::open([

            'route'  => [
                            array_has($form_action, 'route') ? $form_action['route'] ? $form_action['route'] : 'panel.home' : 'panel.home',

                            array_has($form_action, 'parameter') ? $form_action['parameter'] ? $form_action['parameter'] : '' : '',
                        ],

            'method' => array_has($form_action, 'method') ? $form_action['method'] ? $form_action['method'] : 'GET' : 'GET',

            'id'     => array_has($form_action, 'id') ? $form_action['id'] ? $form_action['id'] : '' : '',

            ]) !!}

            @if(isset($form_action['inputs']))

                @foreach($form_action['inputs'] as $input)

                    {{
                        Form::hidden(

                            array_has($input, 'name') ? $input['name'] ? $input['name'] : '' : '',

                            array_has($input, 'value') ? $input['value'] ? $input['value'] : null : null,

                            [
                                'id' => array_has($input, 'id') ? $input['id'] ? $input['id'] : '' : '',
                            ]
                        )
                    }}

                @endforeach

            @endif

        {!! Form::Close() !!}

    @endforeach

@endif

