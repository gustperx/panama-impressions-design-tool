{{-- Builder Product --}}
@if($design == 'adminCreateModel')

    <div class="fpd-product" title="{{ $productModel->title }}" data-thumbnail="/storage/{{ $productModel->thumbnail }}">

        @if($productModel->layers->count() > 0)

            @include('panel.form.partials.layers')

        @endif

    </div>

{{-- View Products - Admin --}}
@elseif($design == 'adminViewModels')

    @foreach($product->models as $productModel)

        @include('panel.form.partials.models')

    @endforeach

{{-- View Products - Admin --}}}
@elseif($design == 'clientProductDesign')

    @include('panel.form.partials.models')

@endif