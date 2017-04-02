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
    <script>
        $(document).ready(function(){

            var $fpd = $('#fpd'),
                    pluginOpts = {
                        stageWidth: 1200,
                        stageHeight: 600,
                        editorMode: false,
                        initialActiveModule: "",
                        mainBarModules: ['products', 'images', 'designs', 'text'],
                        actions: {
                            'top': ['download','print', 'snap', 'preview-lightbox'],
                            'right': ['magnify-glass', 'zoom', 'reset-product', 'qr-code'],
                            'bottom': ['undo','redo'],
                            'left': ['manage-layers','info','save','load']
                            },

                        toolbarPlacement: "dynamic",
                        selectedColor: "#f5f5f5",
                        boundingBoxColor: "#005ede",
                        outOfBoundaryColor: "#990000",
                        cornerIconColor: "#000000",
                        customTextParameters: {
                            colors: false,
                            removable: true,
                            resizable: true,
                            draggable: true,
                            rotatable: true,
                            autoCenter: true,
                            boundingBox: "Base"
                        },
                        customImageParameters: {
                            draggable: true,
                            removable: true,
                            resizable: true,
                            rotatable: true,
                            colors: '#000',
                            autoCenter: true,
                            boundingBox: "Base"
                        },

                        customImageAjaxSettings: {
                            url: '/handler/custom-image-handler.php',
                            data: {
                                saveOnServer: 1,
                                uploadsDir: './uploads',
                                uploadsDirURL: '/handler/uploads'
                            }
                        },
                        langJSON: '/vendor/plugins/fancy-product-designer/lang/es.json',
                    };

            var productDesigner = new FancyProductDesigner($fpd, pluginOpts);

            //api methods can be used
            productDesigner.print();

            //you can listen to events
            $fpd.on('productCreate', function() {
                //do something
            });


            //click handler for #store-product-db
            $('#store-product-db').click(function() {

                // load layers in input
                $('#input-layers').val(JSON.stringify(productDesigner.getProduct()));

                // ajax
                var form = $('#form-save');

                var url = form.attr('action');

                var data = form.serialize();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    cache: false,
                    success: function(data) {

                        console.log(data);

                        //swal(message.title, message.body, message.type);

                    },
                    error: function(data) {

                        console.log(data);
                    }
                },"json");

            });

            //click handler for #load-product-db
            $('#load-product-db').click(function() {

                var form = $('#form-load');

                var url = form.attr('action');

                var data = form.serialize();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    cache: false,
                    success: function(data) {

                        console.log(data);

                        productDesigner.loadProduct(JSON.parse(data));

                        //swal(message.title, message.body, message.type);

                    },
                    error: function(data) {

                        console.log(data);
                    }
                },"json");

            });

            $('#view-parameters').click(function () {

                console.log(productDesigner.getProduct())

            });

        });
    </script>
@stop

@section('content')

    <div id="fpd" class="fpd-container fpd-topbar fpd-views-inside-left fpd-shadow-1 fpd-top-actions-centered fpd-bottom-actions-centered fpd-grid-columns-2">


        @if($product->views->count() > 1)

            @foreach($product->views as $view)

                <div class="fpd-product" title="{{ $view->title }}" data-thumbnail="/storage/{{ $view->thumbnail }}">

                    @foreach($view->layers as $layer)

                        <img src="{{ $layer->source }}" title="{{ $layer->title }}" data-parameters="{{ $layer->parameters }}" />

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


        @include('designer.examples.partials.example-design')

    </div>

    <br>

@stop
