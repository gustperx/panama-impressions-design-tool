<!-- Nav bar Start -->
<nav class="navbar navbar-default container">

    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">

            <span>

                <a href="{{ route(Settings::getConfig()->home) }}">

                    <i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc"></i>

                </a>

            </span>

        </button>

        <a class="navbar-brand" href="{{ route(Settings::getConfig()->home) }}">

            <img src="{{ Settings::getConfig()->logo_header }}" alt="logo" class="logo_position">

        </a>

    </div>

    <div class="collapse navbar-collapse" id="collapse">

        <ul class="nav navbar-nav navbar-right">

            <li {!! (Route::is(Settings::getConfig()->home) ? 'class="active"' : '') !!}>

                <a href="{{ route(Settings::getConfig()->home) }}"> Inicio</a>

            </li>

            @include('layouts.components.menu')

        </ul>

    </div>

</nav>
<!-- Nav bar End -->