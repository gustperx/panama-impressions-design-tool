{{--
{!! Field::textarea(

    isset($input['name']) ? $input['name'] ? $input['name'] : '' : '',

    [
        'class'    => isset($input['class']) ? $input['class'] ? $input['class'] : "" : "",

        'max'      => isset($input['max']) ? $input['max'] ? $input['max'] : 255 : 255,

        'data-role' => isset($input['data-role']) ? $input['data-role'] ? $input['data-role'] : '' : '',

        'required' => isset($input['required']) ? $input['required'] ? $input['required'] : false : false,
    ]
) !!}

--}}

<div class="form-group {{ $errors->first($input['name'], 'has-error') }}">

    <div class="controls">

        <div class="fileinput fileinput-new" data-provides="fileinput">

            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                <img data-src="holder.js/100%x100%" alt="demo"></div>

            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>

            <div>
            <span class="btn btn-primary btn-file">
                <span class="fileinput-new">Buscar imagen</span>
                <span class="fileinput-exists">Cambiar</span>
                <input type="file" name="{{ $input['name'] }}">
            </span>

                <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remover</a>
            </div>

        </div>

        @foreach ($errors as $error)
            <p class="help-block">{{ $error }}</p>
        @endforeach

    </div>


</div>

<span class="help-block">{{ $errors->first($input['name'], ':message') }}</span>