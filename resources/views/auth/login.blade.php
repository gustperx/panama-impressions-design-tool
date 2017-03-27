@extends('base.auth')

{{-- Page title --}}
@section('title')
    Inicio de Sesion
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    @include('auth.partials.background')
    {{ Html::style('/assets/css/frontend/login.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop

{{-- Page content --}}
@section('content')

    <div class="container">

        <!--Content Section Start -->
        <div class="row">

            <div class="box animation flipInX">

                <div class="box1">

                    @include('auth.partials.logo')

                    <h3 class="text-primary">Iniciar Sesión</h3>

                    @include('layouts.notifications')

                    {!! Form::open(["route" => ["login"], "method" => "POST", "class" => "omb_loginForm", "autocomplete" => "off"]) !!}

                        {!! Field::email('email', ['ph' => trans('validation.attributes.email')]) !!}

                        {!! Field::password('password', ['ph' => trans('validation.attributes.password')]) !!}

                        {!! Form::submit('Iniciar Sesión', ['class' => 'btn btn-block btn-primary']) !!}

                        ¿No tiene una cuenta? {!! link_to_route('register', 'Regístrate', $parameters = [], $attributes = []) !!}

                    {!! Form::close() !!}

                </div>

                <div class="bg-light animation flipInX">
                    <p>
                        <a href="{{ route('password.request') }}" id="forgot_pwd_title">¿Se te olvidó tu contraseña?</a>
                    </p>
                </div>

            </div>

        </div>
        <!-- //Content Section End -->

    </div>

@endsection
