@component('mail::message')

#Estimado(a) {{ $name }}, Bienvenido !!

Sus credenciales de acceso a la plataforma son:

<p>
    Web: <a href="{{ url('/') }}"> {{ Settings::getConfig()->fullname }} </a>
</p>

<p>
    Nombre de usuario: {{ $email }}
</p>

<p>
    Contraseña: {{ $password }}
</p>

<p>
    Para completar su registro es necesario verificar su cuenta, puede hacerlo presionando en el siguiente enlace:
</p>

@component('mail::button', ['url' => route('registration.confirmation', [$token])])
Verificar mi Cuenta
@endcomponent

Gracias,<br>
{{ Settings::getConfig()->fullname }}
@endcomponent
