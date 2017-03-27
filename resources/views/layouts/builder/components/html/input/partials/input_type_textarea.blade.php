{!! Field::textarea(

    isset($input['name']) ? $input['name'] ? $input['name'] : '' : '',

    [
        'class'    => isset($input['class']) ? $input['class'] ? $input['class'] : "" : "",

        'max'      => isset($input['max']) ? $input['max'] ? $input['max'] : 255 : 255,

        'data-role' => isset($input['data-role']) ? $input['data-role'] ? $input['data-role'] : '' : '',

        'required' => isset($input['required']) ? $input['required'] ? $input['required'] : false : false,
    ]
) !!}