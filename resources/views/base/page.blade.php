<!DOCTYPE html>

    <html lang="{{ config('app.locale') }}">

        <head>
            {{-- head base --}}
                @include('base.partials.head')
            {{-- end of head base --}}

            {{-- global css --}}
                {{ Html::style('/assets/css/lib.css') }}
            {{-- end of global css --}}

            {{--page level css --}}
                @yield('header_styles')
            {{--end of page level css --}}
        </head>

        <body>

            {{-- header --}}
            <header>
                @include('base.partials.page.header')

                @include('base.partials.page.aside')
            </header>
            {{-- end of header --}}

            {{-- slider / breadcrumbs section --}}
            @section('top')
                @include('layouts.builder.breadcumb.menu')
            @show

            <br>

            {{--main content --}}
            <div class="container">

                <div class="row">

                    @include('layouts.notifications')

                    @yield('content')

                </div>

            </div>
            {{--main content ends --}}

            {{-- footer --}}
                @include('base.partials.page.footer')
            {{-- end footer --}}

            {{-- back to top --}}
                @include('base.partials.back-to-top')
            {{-- back to top --}}

            {{-- global javascript --}}
                {{ Html::script('/assets/js/frontend/lib.js') }}
                {{ Html::script('/assets/js/frontend/style-switcher.js') }}
            {{-- end of global javascript --}}

            <!-- begin page level js -->
                @yield('footer_scripts')
            <!-- end page level js -->

        </body>

    </html>