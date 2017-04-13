@foreach($productModel->layers as $layer)

    @if($layer->type == 'text')

        <span title="{{ $layer->title }}" data-parameters="{{ $layer->parameters }}" > {{ $layer->source }} </span>

    @elseif($layer->type == 'image')

        <img src="{{ $layer->source }}" title="{{ $layer->title }}" data-parameters="{{ $layer->parameters }}" />

    @endif

@endforeach