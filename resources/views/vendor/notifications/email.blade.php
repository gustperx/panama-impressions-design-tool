@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hola!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
    Recibió este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.
@endforeach

{{-- Action Button --}}
@if (isset($actionText))
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
Restablecer Contraseña
@endcomponent
@endif

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
    Si no solicitó un restablecimiento de contraseña, no se requiere ninguna acción adicional.
@endforeach

<!-- Salutation -->
@if (! empty($salutation))
{{ $salutation }}
@else
Gracias,<br>{{ Settings::getConfig()->fullname }}
@endif

<!-- Subcopy -->
@if (isset($actionText))
@component('mail::subcopy')
Si tiene problemas al hacer clic en el botón "Restablecer Contraseña" copie y pegue la URL a continuación
en su navegador web: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endif
@endcomponent
