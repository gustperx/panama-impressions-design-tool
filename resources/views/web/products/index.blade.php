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
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/vendor/plugins/wow/js/wow.min.js') }}
    <script>
        jQuery(document).ready(function () {
            new WOW().init();
        });
    </script>
@stop

@section('content')

    <!-- Best Deal Section Start -->
    <div class="row">

        {{-- <h3 id="title">{{ trans('products.front.all') }}</h3> --}} <br>

        @forelse($allProducts as $product)

            <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3.5s">

                <div class="thumbnail text-center">

                    <a href="{{ URL::to('products/single') }}">
                        <img src="{{ asset("storage/".$product->thumbnail) }}" class="img-responsive" alt="{{ $product->title }}">
                    </a>

                    <br/>

                    <h4 class="text-primary">{{ $product->title }}</h4>

                    {{--
                    <ul>
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Android v4.4.2 (KitKat)</li>
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 13 MP,Autofocus, LED flash</li>
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 5.5 Inch Screen</li>
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 1080HD Video</li>
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 16M colors</li>
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Octa-core 1.7 GHz Cortex-</li>
                    </ul>
                    --}}

                    <h4 class="text-danger">Rs. 17,826 </h4>

                    <a href="{{ URL::to('products/single') }}" class="btn btn-primary btn-block text-white">
                        Añadir al carrito
                    </a>

                </div>

            </div>

        @empty

            <p>
                Disculpe en estos momentos no hay productos disponibles, regrese mas tarde.
            </p>

            <p>
                Gracias
            </p>

        @endforelse


    </div>
    <!-- //Best Deal Section End -->

    <div class="row" align="center">
        {!! $allProducts->render() !!}
    </div>

@stop
