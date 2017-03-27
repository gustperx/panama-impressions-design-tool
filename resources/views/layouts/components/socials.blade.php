@foreach(Settings::getSocials() as $link)

    <li>
        <a href="{{ $link->url }}" target="_blank">
            <i class="livicon" data-name="{{ $link->social->icon }}" data-size="18" data-loop="true" data-c="#fff" data-hc="{{ $link->social->color }}"></i>
        </a>
    </li>

@endforeach