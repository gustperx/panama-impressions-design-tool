@extends('base.page')

{{-- Page title --}}
@section('title')
    Diseñador de Productos
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- The CSS for the plugin itself - required -->
    {{ Html::style('/vendor/plugins/fancy-product-designer/css/FancyProductDesigner-all.min.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- Include js files-->
    {{ Html::script('/assets/js/jquery.min.js') }}
    {{ Html::script('/assets/js/jquery-ui.min.js') }}

    <!-- HTML5 canvas library - required -->
    {{ Html::script('/vendor/plugins/fancy-product-designer/js/fabric.min.js') }}

    <!-- The plugin itself - required -->
    {{ Html::script('/vendor/plugins/fancy-product-designer/js/FancyProductDesigner-all.min.js') }}

    <!-- Config -->
    @can('isAdmin')
        {{ Html::script('/app/fancy-product-designer/admin-config.js') }}
    @endcan

    @can('isClient')
        {{ Html::script('/app/fancy-product-designer/client-config.js') }}
    @endcan
@stop

@section('content')

    <div id="main-container">

        <h3 id="clothing">Clothing Designer</h3>

        <div id="clothing-designer" class="fpd-container fpd-topbar fpd-views-inside-left fpd-shadow-1 fpd-top-actions-centered fpd-bottom-actions-centered fpd-grid-columns-2">

            @can('isClient')
                @include('designer.examples.partials.example')
            @endcan

            @can('isAdmin')
                <div class="fpd-product" title="TITLE" data-thumbnail="images/sweater/preview.png">

                </div>
            @endcan

            @include('designer.examples.partials.example-design')

        </div>

        <br />

        <div class="fpd-clearfix" style="margin-top: 30px;">
            <div class="api-buttons fpd-container fpd-left">
                <a href="#" id="print-button" class="fpd-btn">Print</a>
                <a href="#" id="image-button" class="fpd-btn">Create Image</a>
                <a href="#" id="checkout-button" class="fpd-btn">Checkout</a>
                <a href="#" id="recreation-button" class="fpd-btn">Recreate product</a>
            </div>
            <div class="fpd-right">
                <span class="price badge badge-inverse"><span id="thsirt-price"></span> $</span>
            </div>
        </div>

        <p class="fpd-container">
            Only working on a webserver:<br />
            <span class="fpd-btn" id="save-image-php">Save image with php</span>
            <span class="fpd-btn" id="send-image-mail-php">Send image to mail</span>
        </p>

    </div>

@stop
