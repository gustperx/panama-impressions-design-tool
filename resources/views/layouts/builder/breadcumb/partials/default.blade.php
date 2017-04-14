<li>
    @if(isset($webBreadcrumb))

        <a href="{{ route('web.home') }}">
            <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>
            Dashboard
        </a>

    @else

        <a href="{{ route('panel.home') }}">
            <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>
            Dashboard
        </a>

    @endif
</li>