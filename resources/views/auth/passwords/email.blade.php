@extends('base.auth')

{{-- Page title --}}
@section('title')
    Restablecer
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    @include('auth.partials.background')
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

                <h3 class="text-primary text-center">Se te olvidó tu contraseña</h3>

                <p class="text-center">Ingrese su correo electrónico para restablecer su contraseña</p>

                @include('layouts.notifications')

                {!! Form::open(["route" => ["password.email"], "method" => "POST", "class" => "omb_loginForm", "autocomplete" => "off"]) !!}

                    {!! Field::email('email', ['ph' => trans('validation.attributes.email')]) !!}

                    {!! Form::submit('Restablecer su contraseña', ['class' => 'btn btn-block btn-primary']) !!}

                    <p>
                        ¿No tiene una cuenta? {!! link_to_route('register', 'Regístrate', $parameters = [], $attributes = []) !!}
                    </p>

                    <p>
                        ¿Ya tienes una cuenta? Por favor {!! link_to_route('login', 'Inicia Sesión', $parameters = [], $attributes = []) !!}
                    </p>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection
