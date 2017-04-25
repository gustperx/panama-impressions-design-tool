<div class="row">

    <br>

    @forelse($allProducts as $productModel)

        <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3.5s">

            <div class="thumbnail text-center">

                <img src="{{ asset("storage/".$productModel->thumbnail) }}" class="img-responsive" alt="{{ $productModel->title }}">

                <br/>

                <h4 class="text-primary">{{ $productModel->title }}</h4>

                <ul>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> <strong>Producto:</strong> {{ $productModel->product->title }} </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> <strong>Modelo:</strong> {{ $productModel->title }} </li>
                    <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i> <strong>Categoria:</strong> {{ $productModel->product->category->title }} </li>
                </ul>

                <h4 class="text-primary"> Ofertas </h4>

                <ul>
                    @foreach($productModel->product->measures as $measure)
                        <li><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#787878" data-hc="787878"></i>
                            {{ Settings::getGeneralConfig()->coin . $measure->pivot->sale_price }}
                            ({{ $measure->high }} x {{ $measure->width }} {{ Settings::getGeneralConfig()->unit_measurement }}) <br>
                            ({{ $measure->pivot->quantity }} unidades)
                        </li>
                    @endforeach
                </ul>

                @if(Auth::check())
                    @can('isClient')
                        <button class="btn btn-primary btn-block text-white btn-add-to-car" data-id="{{ $productModel->id }}"> Añadir al carrito </button>
                    @endcan
                @endif

            </div>

        </div>

    @empty

        <h2>
            Disculpe en estos momentos no hay productos disponibles, regrese mas tarde.
        </h2>

        <h3>
            Gracias
        </h3>

    @endforelse


</div>

<div class="row" align="center">
    {!! $allProducts->appends(Request::only(['description', 'category_id']))->render() !!}
</div>