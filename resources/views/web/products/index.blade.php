@extends('base.page')

{{-- Page title --}}
@section('title')
    Productos
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/shopping.css') }}
    {{ Html::style('/vendor/plugins/animate/animate.min.css') }}
    {{ Html::style('/vendor/plugins/sweetalert/css/sweetalert.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/vendor/plugins/wow/js/wow.min.js') }}
    {{ Html::script('/vendor/plugins/sweetalert/js/sweetalert.min.js') }}
    {{ Html::script('/app/http.js') }}
    {{ Html::script('/app/shop/shop.js') }}
    <script>
        jQuery(document).ready(function () {
            new WOW().init();
        });
    </script>
@stop

@section('content')

    @include('web.products.partials.filter')

    @include('web.products.partials.shop')

    {!! Form::open(['route' => ['web.car.add'], 'method' => 'POST', 'id' => 'form_add_product_to_car']) !!}
        {!! Field::hidden('product_model_id', null, ['id' => 'product_model_id']) !!}
    {!! Form::Close() !!}

@stop
