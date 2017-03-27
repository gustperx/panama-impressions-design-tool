<?php

namespace App\Modules\Auth;

use App\Mail\Auth\Confirmation;
use Exception;
use Illuminate\Support\Facades\Mail;
use Styde\Html\Facades\Alert;

class UserMailer
{

    public function confirmation(User $user, $password)
    {
        try {

            Mail::send(new Confirmation($user, $password));

            Alert::info('Hemos enviado un correo de confirmación para verificar tu cuenta');

        } catch (Exception $exception) {

            Alert::warning("No se a podido enviar el correo de confirmación, por favor comuníquese con el administrador del sistema");
        }
    }
    
}