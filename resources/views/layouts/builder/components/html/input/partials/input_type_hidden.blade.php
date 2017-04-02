{!! Field::hidden(

    isset($input['name']) ? $input['name'] ? $input['name'] : '' : '',

    isset($input['value']) ? $input['value'] ? $input['value'] : '' : '',

    [
        'class' => isset($input['class']) ? $input['class'] ? $input['class'] : '' : '',
    ]

) !!}