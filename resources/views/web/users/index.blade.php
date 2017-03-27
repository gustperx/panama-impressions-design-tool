@extends('base.page')

{{-- Page title --}}
@section('title')
    Mi Cuenta
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/vendor/plugins/jasny-bootstrap/css/jasny-bootstrap.css') }}
    {{ Html::style('/assets/css/frontend/user_account.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/vendor/plugins/jasny-bootstrap/js/jasny-bootstrap.js') }}
@stop

@section('content')

    <div class="welcome">
        <h3>Mi Cuenta</h3>
    </div>

    <hr>

    <div class="row">

        <div class="row">

            <div class="col-md-12">

                @include('web.users.partials.form')

            </div>

        </div>

    </div>

@stop
