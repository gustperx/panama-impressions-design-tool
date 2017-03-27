{!! Form::checkboxes(

    isset($input['name']) ? $input['name'] ? $input['name'] : '' : '',

    isset($input['options']) ? $input['options'] ? $input['options'] : [] : [],

    isset($input['selected']) ? $input['selected'] ? $input['selected'] : [] : []

) !!}