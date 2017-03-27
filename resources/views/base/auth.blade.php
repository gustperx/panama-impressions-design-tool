<!DOCTYPE html>

    <html lang="{{ config('app.locale') }}">

        <head>
            {{-- head base --}}
                @include('base.partials.head')
            {{-- end of head base --}}

            {{-- global css  --}}
                {{ Html::style('/assets/css/bootstrap.min.css') }}
            {{-- end of global css --}}

            {{--page level css --}}
                @yield('header_styles')
            {{--end of page level css --}}
        </head>

        <body>

            {{-- content --}}
            <section class="content">
                @yield('content')
            </section>
            {{-- content --}}

            {{-- global javascript --}}
                {{ Html::script('/assets/js/jquery.min.js') }}
                {{ Html::script('/assets/js/bootstrap.min.js') }}
            {{-- end of global javascript --}}

            {{-- begin page level js --}}
                @yield('footer_scripts')
            {{-- end page level js --}}

        </body>

    </html>