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
        <h3 id="title">BEST DEALS</h3>
        <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3.5s">
            <div class="thumbnail text-center">
                <a href="{{ URL::to('products/single') }}"><img src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" alt="htc image"></a>
                <br/>
                <h5 class="text-primary">HTC Desire 816G Plus - (Blue)</h5>
                <ul>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Android v4.4.2 (KitKat)</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 13 MP,Autofocus, LED flash</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 5.5 Inch Screen</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 1080HD Video</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 16M colors</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Octa-core 1.7 GHz Cortex-</li>
                </ul>
                <h4 class="text-primary">Rs. 17,826 <del class="text-danger">Rs. 21,990</del> </h4>
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary btn-block text-white">View</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3s" data-wow-delay="0.5s">
            <div class=" thumbnail text-center">
                <a href="{{ URL::to('products/single') }}"><img src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" alt="sony image"></a>
                <br/>
                <h5 class="text-primary">Sony Xperia C3 - (Black)</h5>
                <ul>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Android v4.4.2 (KitKat)</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 8 MP autofocus LED flash</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 5.0 Inch Screen </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> TFT capacitive touchscreen </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 16M colors</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Quad-core 1.2 GHz</li>
                </ul>
                <h4 class="text-primary">Rs. 18,088 <del class="text-danger">Rs. 21,990</del> </h4>
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary btn-block text-white">View</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3s" data-wow-delay="0.9s">
            <div class=" thumbnail text-center">
                <a href="{{ URL::to('products/single') }}"><img src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" alt="karbon image"></a>
                <br/>
                <h5 class="text-primary">Karbonn Titanium Octane Plus</h5>
                <ul>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Android OS, v5.0.2 (Lollipop)</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 16 MP,Autofocus, LED flash</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 5.0 inch Screen </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Nano Sim</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Quad 2.1GHz + Quad </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> LCD capacitive touchscreen,</li>
                </ul>
                <h4 class="text-primary">Rs. 7,700 <del class="text-danger">Rs. 13,990</del></h4>
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary btn-block text-white">View</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3s" data-wow-delay="1.4s">
            <div class=" thumbnail text-center">
                <a href="{{ URL::to('products/single') }}"><img src="{{ asset('/assets/images/demos/products/laravel.png') }}" class="img-responsive" alt="nokia image"></a>
                <br/>
                <h5 class="text-primary">Microsoft Lumia 535 Dual SIM </h5>
                <ul>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Microsoft Windows Phone 8.1</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 5 MP, Camera </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> autofocus, LED flash </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 5.0 inch Screen </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> 16M colors</li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> Dual Sim</li>
                </ul>
                <h4 class="text-primary">Rs. 8,571 <del class="text-danger">Rs. 10,299</del> </h4>
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary btn-block text-white">View</a>
            </div>
        </div>
        <nav>
            <ul class="pagination pull-right">
                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                <li><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
            </ul>
        </nav>
    </div>
    <!-- //Best Deal Section End -->

@stop
