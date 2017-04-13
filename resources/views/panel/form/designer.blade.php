@extends('base.page')

{{-- Page title --}}
@section('title')
    Diseñador de Productos |
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/panel.css') }}
    {{ Html::style('/vendor/plugins/sweetalert/css/sweetalert.css') }}

    <!-- The CSS for the plugin itself - required -->
    {{ Html::style('/vendor/plugins/fancy-product-designer/css/FancyProductDesigner-all.min.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/vendor/plugins/sweetalert/js/sweetalert.min.js') }}
    {{ Html::script('/app/http.js') }}
    @include('panel.form.partials.fpd-js-assets')
@stop

@section('content')
    @include('panel.form.partials.panel-designer')

    @include('layouts.builder.components.html.form.form_multiple_actions')
@stop
