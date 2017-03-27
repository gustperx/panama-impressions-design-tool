@extends('base.auth')

{{-- Page title --}}
@section('title')
    Restablecer
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/forgot.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop

{{-- Page content --}}
@section('content')

    <div class="container">

        <div class="row">

            <div class="box animation flipInX">

                @include('auth.partials.logo')

                <h3 class="text-primary text-center">Restablecer su contraseña</h3>

                <p class="text-center">Ingrese los detalles de su nueva contraseña</p>

                {!! Form::open(["route" => ["password.request"], "method" => "POST", "class" => "omb_loginForm", "autocomplete" => "off"]) !!}

                    {!! Field::hidden('token', $token) !!}

                    {!! Field::email('email', ['ph' => trans('validation.attributes.email')]) !!}

                    {!! Field::password('password', ['ph' => trans('validation.attributes.password')]) !!}

                    {!! Field::password('password_confirmation', ['ph' => trans('validation.attributes.password_confirmation')]) !!}

                    {!! Form::submit('Restablecer la contraseña', ['class' => 'btn btn-block btn-primary']) !!}

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection
