@component('mail::message')
# Formulario de Contacto

<p>
    {{ $body }}
</p>

Gracias,<br>
{{ Settings::getConfig()->fullname }}
@endcomponent
