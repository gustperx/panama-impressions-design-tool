<div class="row">

    <br>

    @forelse($allProducts as $productModel)

        <div class="col-sm-6 col-md-3 wow flipInX" data-wow-duration="3.5s">

            <div class="thumbnail text-center">

                <img src="{{ asset("storage/".$productModel->thumbnail) }}" class="img-responsive" alt="{{ $productModel->title }}">

                <br/>

                <h4 class="text-primary">{{ $productModel->title }}</h4>

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