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
    <script>
        jQuery(document).ready(function () {
            new WOW().init();

            $(".btn-add-to-car").click(function () {

                // load id product model in input form
                $('#product_model_id').val($(this).data("id"));

                // parameters ajax
                var form = $('#form_add_product_to_car');

                var url = form.attr('action');

                var data = form.serialize();

                // run ajax
                ajaxPostClassic(url, data)

            })

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
