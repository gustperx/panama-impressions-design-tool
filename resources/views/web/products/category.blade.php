@extends('base.page')

{{-- Page title --}}
@section('title')
    Categorías
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/cart.css') }}
    {{ Html::style('/assets/css/font-awesome.min.css') }}
    {{ Html::style('/assets/css/frontend/tabbular.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop

@section('content')

    <!--recently view item-->
    <div class="row">
        <h2 class="text-primary"> Categories</h2>
        <div class="divider"></div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1599.00</del>  Rs. 1198.00   </h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
    </div>
    <div class="row">
        <div class="divider"></div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
    </div>
    <div class="row">
        <div class="divider"></div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
        <div class="flip-3d">
            <figure>
                <img src="{{ asset('/assets/images/demos/products/laravel.png') }}" alt="product image">
                <figcaption>
                    <h4 class="text-white">Floral Printed Saree</h4>
                    <ul class="hidden-xs">
                        <li>Product Type - Women's Saree</li>
                        <li>Color - Multi Colour</li>
                    </ul>
                    <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                </figcaption>
            </figure>
            <div class="text-center mart10">
                <a href="{{ URL::to('products/single') }}" class="btn btn-primary text-white">View</a></div>
        </div>
    </div>
    <!--recently view item end-->

@stop
