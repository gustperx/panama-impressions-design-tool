{!! Field::password(

    isset($input['name']) ? $input['name'] ? $input['name'] : '' : '',

    [
        'max'      => isset($input['max']) ? $input['max'] ? $input['max'] : 30 : 30,

        'ph'       => trans("validation.attributes." . $input['name']),

        'required' => isset($input['required']) ? $input['required'] ? $input['required'] : false : false,
    ]
) !!}