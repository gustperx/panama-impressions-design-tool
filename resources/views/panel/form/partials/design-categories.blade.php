@if(isset($categories))

    @foreach($categories as $category)

        <div class="fpd-design">

            <div class="fpd-category" title="{{ $category->title }}">

                @foreach($category->designs as $designProduct)

                    <img src="/storage/{{ $designProduct->source }}" title="{{ $designProduct->title }}" data-parameters="{{ $designProduct->parameters }}" />

                @endforeach

            </div>

        </div>

    @endforeach

@endif