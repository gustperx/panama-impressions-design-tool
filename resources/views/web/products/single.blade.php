@extends('base.page')

{{-- Page title --}}
@section('title')
    Producto
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/cart.css') }}
    {{ Html::style('/assets/css/font-awesome.min.css') }}
    {{ Html::style('/assets/css/frontend/tabbular.css') }}
    {{ Html::style('/vendor/plugins/bootstrap-rating/bootstrap-rating.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/assets/js/frontend/elevatezoom.js') }}
    {{ Html::script('/vendor/plugins/bootstrap-rating/bootstrap-rating.js') }}
    {{ Html::script('/assets/js/frontend/cart.js') }}
@stop

@section('content')

    <!--item view start-->
    <div class="row">
        <div class="mart10">

            <!--product view-->
            <div class="col-md-4">
                <div class="row">
                    <div class="product_wrapper">
                        <img id="zoom_09" src="{{ asset("storage/".$productModel->thumbnail) }}" data-zoom-image="{{ asset("storage/".$productModel->thumbnail) }}" class="img-responsive" />
                    </div>
                </div>
            </div>

            <!--individual product description-->
            <div class="col-md-8">
                <h2 class="text-primary"> {{ $productModel->title }} </h2>

                <ul>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> <strong>Producto:</strong> {{ $productModel->product->title }} </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> <strong>Modelo:</strong> {{ $productModel->title }} </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> <strong>Precio Unitario:</strong> {{ Settings::getGeneralConfig()->coin . $productModel->product->unit_price }} </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> <strong>Categoria:</strong> {{ $productModel->product->category->title }} </li>
                </ul>

                <h4 class="text-primary"> Ofertas </h4>

                <ul>
                    @foreach($productModel->product->measures as $measure)
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i>
                            {{ Settings::getGeneralConfig()->coin . $measure->pivot->sale_price }}
                            ({{ $measure->pivot->quantity }} unidades)
                            (<strong>{{ $measure->title }}</strong> - {{ $measure->high }} x {{ $measure->width }} {{ Settings::getGeneralConfig()->unit_measurement }})
                        </li>
                    @endforeach
                </ul>

                {!! Form::open(['route' => ['web.car.add'], 'method' => 'POST', 'id' => 'form_add_product_to_car']) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Field::number('quantity', ['min' => 1, 'ph' => trans('validation.attributes.quantity'), 'required']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Field::select('offer', $measures, ['empty' => 'Precio Unitario']) !!}
                        </div>
                    </div>

                    {!! Field::hidden('product_model_id', $productModel->id, ['id' => 'product_model_id']) !!}

                    @if(Auth::check())
                        @can('isClient')
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="btn btn-primary btn-lg text-white" type="submit" value="Agregar al Carrito">
                                </div>
                            </div>
                        @endcan
                    @endif

                {!! Form::Close() !!}

                <br><br><br>

            </div>
        </div>
    </div>
    <!--item view end-->

@stop
