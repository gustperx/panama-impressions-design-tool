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
                //Send data (action and product views) to PHP script
                /*
                $.post("", { views: JSON.stringify(productDesigner.getProduct()) }, function(data) {
                    //check for errors
                    if(parseInt(data) > 0) {
                        //successfully added
                        alert('Product with ID '+data+' stored!');
                    }
                    else {
                        alert('Error: '+data+'');
                    }
                });
                */

                var form = $('#form-save');

                var url = form.attr('action');

                var views = JSON.stringify(productDesigner.getProduct());

                $('#input-views').val(views);

                var data = form.serialize();

                //console.log(url);

                //console.log(data);

                //console.log(views);

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



                //console.log($('#form-save').attr('action'));


                //console.log(productDesigner.getProduct());

            });

            //click handler for #load-product-db
            $('#load-product-db').click(function() {

                //Send data (action and id) to PHP script, in this case I am loading a product with ID 17
                /*
                $.post("php/product_in_db.php", { action: 'load', id: 17 }, function(data) {
                    productDesigner.loadProduct(JSON.parse(data));
                });
                */

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

        <div class="fpd-product" title="Basecap" data-thumbnail="images/cap/preview.png">

            @if(isset($view))
                @foreach($view as $product)
                    <img src="{{ $product->source }}" title="{{ $product->title }}" data-parameters="{{ $product->parameters }}" />
                @endforeach
            @endif



            <!--
                <img src="/designer/images/cap/basic.png" title="Base" data-parameters='{"left": 318, "top": 311, "colors": "#ededed", "price": 5}' />
                <img src="/designer/images/cap/highlights.png" title="Hightlights" data-parameters='{"left": 309, "top": 300}' />
                <img src="/designer/images/cap/shadows.png" title="Shadows" data-parameters='{"left": 306, "top": 299}' />
            -->

        </div>

        @include('designer.examples.partials.example-design')

    </div>

    <br>

    <label>

        hola

        <input type="button" id="store-product-db" value="save">

        <input type="button" id="load-product-db" value="load">

        <input type="button" id="view-parameters" value="parameters">

    </label>

    {!! Form::open(['route' => ['designer.admin.save'], 'method' => 'POST', 'id' => 'form-save']) !!}
        <input type="hidden" name="views" id="input-views">
    {!! Form::Close() !!}

    {!! Form::open(['route' => ['designer.admin.load', 3], 'method' => 'POST', 'id' => 'form-load']) !!}
    {!! Form::Close() !!}

@stop
