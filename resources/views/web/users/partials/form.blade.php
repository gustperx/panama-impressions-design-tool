<div class="position-center">

    <div>
        <h3 class="text-primary" id="title"> Información Personal</h3>
    </div>

    {!! Form::model($user, ['route' => ['web.me.update', $user], 'method' => 'PUT', 'files' => true]) !!}

        <div class="form-group {{ $errors->first('avatar', 'has-error') }}">
            <label class="col-md-2 control-label">Avatar:</label>
            <div class="col-md-10">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">
                        @if($user->avatar)
                            <img src="{{ asset("storage/".$user->avatar) }}" alt="img"
                                 class="img-responsive"/>
                        @else
                            <img src="http://placehold.it/200x150" alt="Demo"
                                 class="img-responsive"/>
                        @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-primary btn-file">
                            <span class="fileinput-new">Buscar imagen</span>
                            <span class="fileinput-exists">Cambiar</span>
                            <input type="file" name="avatar" id="avatar" />
                        </span>
                        <span class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remover</span>
                    </div>
                </div>
                <span class="help-block">{{ $errors->first('avatar', ':message') }}</span>
            </div>
        </div>

        {!! Field::text('first_name', ['max' => 50, 'ph' => trans('validation.attributes.first_name'), 'required']) !!}

        {!! Field::text('last_name', ['max' => 50, 'ph' => trans('validation.attributes.last_name'), 'required']) !!}

        {!! Field::email('email', ['' => 60,'ph' => trans('validation.attributes.email'), 'required']) !!}

        {!! Field::password('password', ['ph' => trans('validation.attributes.password')]) !!}

        {!! Field::password('password_confirmation', ['ph' => trans('validation.attributes.password_confirmation')]) !!}

        <br>

        {!! Form::submit('Actualizar', ['class' => 'btn btn-block btn-primary']) !!}

    {!! Form::close() !!}

    <br><br><br>

</div>