<?php

namespace App\Http\Middleware\App;

use Closure;
use Facades\App\Facades\Settings;
use Illuminate\Contracts\Auth\Guard;
use Styde\Html\Facades\Alert;

class isVerified
{
    private $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->guard->check()){

            if (! $this->guard->user()->can('isVerified')){

                if ($request->is('panel') || $request->is('panel/*') || $request->is('designer') ||$request->is('designer/*'))
                {
                    Alert::danger('Para acceder al enlace seleccionado se requiere la verificación de su cuenta, gracias.');

                    return redirect()->route(Settings::getConfig()->home);

                } else {

                    Alert::warning("Por favor confirme su dirección de correo electrónico.")
                        ->details('En caso de no haber recibido el correo puede reenviarlo presionado el siguiente enlace recuerde comprobar su bandeja de correo no deseado, gracias.')
                        ->html('<br><a href="/me/confirmation" class="btn btn-info" style="color: #ffffff"> Reenviar Confirmación </a>');
                }
            }

        }

        return $next($request);
    }
}
