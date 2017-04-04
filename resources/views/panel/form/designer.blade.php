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
    <!-- Include js files-->
    {{ Html::script('/assets/js/jquery.min.js') }}
    {{ Html::script('/assets/js/jquery-ui.min.js') }}

    {{ Html::script('/vendor/plugins/sweetalert/js/sweetalert.min.js') }}

    <!-- HTML5 canvas library - required -->
    {{ Html::script('/vendor/plugins/fancy-product-designer/js/fabric.min.js') }}

    <!-- The plugin itself - required -->
    {{ Html::script('/vendor/plugins/fancy-product-designer/js/FancyProductDesigner-all.min.js') }}

    <!-- Config -->

    @if($design == 'model')

        {{ Html::script('/app/designer/admin-config-editorMode.js') }}

    @elseif($design == 'viewVariations')

        {{ Html::script('/app/designer/admin-config-productVariation.js') }}

    @endif

@stop

@section('content')

    <div class="panel panel-primary filterable">

        <div class="panel-heading clearfix">

            @include('layouts.builder.dataTable.partials.builder-title')

        </div>

        <div class="panel-body table-responsive">

            @include('layouts.builder.dataTable.partials.builder-button-actions')

            <br>

            <div id="fpd" class="fpd-container fpd-topbar fpd-views-inside-left fpd-shadow-1 fpd-top-actions-centered fpd-bottom-actions-centered fpd-grid-columns-2">

                @if($design == 'model')

                    <div class="fpd-product" title="{{ $productView->title }}" data-thumbnail="/storage/{{ $productView->thumbnail }}">
                    </div>

                @elseif($design == 'viewVariations')

                    @if($product->views->count() > 1)

                        @foreach($product->views as $view)

                            <div class="fpd-product" title="{{ $view->title }}" data-thumbnail="/storage/{{ $view->thumbnail }}">

                                @foreach($view->layers as $layer)

                                    @if($layer->type == 'text')

                                        <span title="{{ $layer->title }}" data-parameters="{{ $layer->parameters }}" > {{ $layer->source }} </span>

                                    @elseif($layer->type == 'image')

                                        <img src="{{ $layer->source }}" title="{{ $layer->title }}" data-parameters="{{ $layer->parameters }}" />

                                    @endif

                                @endforeach

                            </div>

                        @endforeach

                    @else

                        @foreach($product->views as $view)

                            <div class="fpd-product" title="{{ $view->title }}" data-thumbnail="/storage/{{ $view->thumbnail }}">

                                @foreach($view->layers as $layer)

                                    <img src="{{ $layer->source }}" title="{{ $layer->title }}" data-parameters="{{ $layer->parameters }}" />

                                @endforeach

                            </div>

                        @endforeach

                    @endif

                @endif

                @include('designer.examples.partials.example-design')

            </div>

        </div>

    </div>

    @include('layouts.builder.components.html.form.form_multiple_actions')

@stop
