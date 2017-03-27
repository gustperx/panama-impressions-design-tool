@if(isset($breadcrumb))

    <div class="breadcum">

        <div class="container">

            <ol class="breadcrumb">

                @include('layouts.builder.breadcumb.partials.default')

                @include('layouts.builder.breadcumb.partials.builder')

            </ol>

            @include('layouts.builder.breadcumb.partials.currentPage')

        </div>

    </div>

    @else

    <div class="breadcum">

        <div class="container">

            <ol class="breadcrumb">

                @include('layouts.builder.breadcumb.partials.default')

            </ol>

        </div>

    </div>

@endif