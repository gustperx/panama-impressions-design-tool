@extends('base.page')

{{-- Page title --}}
@section('title')
    Contacto
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/contact.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop

@section('content')

    <!-- Container Section Start -->
    <div class="container">

        <div class="row">

            <!-- Contact form Section Start -->
        @include('web.partials.contact.mail')
        <!-- //Conatc Form Section End -->

            <!-- Address Section Start -->
        @include('web.partials.contact.static')
        <!-- //Address Section End -->

        </div>

    </div>

@stop
