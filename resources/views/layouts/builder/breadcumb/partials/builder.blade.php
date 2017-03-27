@if(isset($breadcrumb['menu']))

    @foreach($breadcrumb['menu'] as $menu)

        <li class="hidden-xs">

            <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>

            @if(is_null($menu['url']))

                {{ $menu['title'] }}

            @else

                <a href="{{ $menu['url'] }}">

                    {{ $menu['title'] }}

                </a>

            @endif

        </li>

    @endforeach

@else

    No a definido el menu

@endif