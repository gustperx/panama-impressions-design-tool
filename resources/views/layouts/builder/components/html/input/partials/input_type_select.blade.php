{!! Field::select(

    isset($input['name']) ? $input['name'] ? $input['name'] : '' : '',

    isset($input['list']) ? $input['list'] ? $input['list'] : null : null,

    [
        'empty'    => isset($input['empty']) ? $input['empty'] ? $input['empty'] : false : false,

        isset($input['multiple']) ? $input['multiple'] ? 'multiple' : '' : '',

        'data-role' => isset($input['data-role']) ? $input['data-role'] ? $input['data-role'] : '' : '',

        'required' => isset($input['required']) ? $input['required'] ? $input['required'] : false : false,
    ]

) !!}