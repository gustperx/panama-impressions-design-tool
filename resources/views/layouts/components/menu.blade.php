@can('isAdmin')
    <li {!! (Request::is('panel') || Request::is('panel/*') || Request::is('designer/*') ? 'class="active"' : '') !!}>
        <a href="{{ route('panel.home') }}"> Panel</a>
    </li>
@endcan

<li {!! (Request::is('products') || Request::is('products/*') ? 'class="active"' : '') !!}>
    <a href="{{ route('web.products.home') }}">Productos</a>
</li>

<li {!! (Request::is('blog') || Request::is('blog/*') ? 'class="active"' : '') !!}>
    <a href="{{ route('web.blog.home') }}"> Blog</a>
</li>

<li {!! (Request::is('contact') ? 'class="active"' : '') !!}>
    <a href="{{ route('web.contact') }}">Contacto</a>
</li>

<li {!! (Request::is('faq') ? 'class="active"' : '') !!}>
    <a href="{{ route('web.faq') }}"> FAQ</a>
</li>

@if(Auth::check())

    <li {{ (Request::is('me') ? 'class=active' : '') }}>
        <a href="{{ route('web.me.home') }}">Mi Cuenta</a>
    </li>

    @can('isClient')
        <li {{ (Request::is('car') ? 'class=active' : '') }}>
            <a href="{{ route('web.car.home') }}">Carrito de Compras</a>
        </li>

        <li {{ (Request::is('orders') ? 'class=active' : '') }}>
            <a href="{{ route('web.orders.home') }}">Mis Ordenes</a>
        </li>
    @endcan

    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            Salir
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>

@else

    <li>
        <a href="{{ url('/login') }}">Inicia Sesión</a>
    </li>

    <li>
        <a href="{{ url('/register') }}">Regístrate</a>
    </li>

@endif