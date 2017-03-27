@extends('base.auth')

{{-- Page title --}}
@section('title')
    Resgister
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    @include('auth.partials.background')
    {{ Html::style('/assets/css/frontend/register.css') }}
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

                @include('auth.partials.logo')

                <h3 class="text-primary text-center">Registro</h3>

                {!! Form::open(['route' => ['register'], 'method' => 'POST', 'id' => 'reg_form']) !!}

                    {!! Field::text('first_name', ['max' => 30, 'ph' => trans('validation.attributes.first_name')]) !!}

                    {!! Field::text('last_name', ['max' => 30, 'ph' => trans('validation.attributes.last_name')]) !!}

                    {!! Field::email('email', ['ph' => trans('validation.attributes.email')]) !!}

                    {!! Field::password('password', ['ph' => trans('validation.attributes.password')]) !!}

                    {!! Field::password('password_confirmation', ['ph' => trans('validation.attributes.password_confirmation')]) !!}

                    <br>

                    {!! Form::submit('Crear cuenta', ['class' => 'btn btn-block btn-primary']) !!}

                    ¿Ya tienes una cuenta? Por favor {!! link_to_route('login', 'Inicia Sesión', $parameters = [], $attributes = []) !!}

                {!! Form::close() !!}

            </div>

        </div>
        <!-- //Content Section End -->

    </div>

@endsection
