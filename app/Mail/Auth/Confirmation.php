<?php

namespace App\Mail\Auth;


use App\Modules\Auth\User;
use Facades\App\Facades\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Confirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    private $password;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param $password
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.confirmation')
            ->with([
                'name'     => $this->user->fullname,
                'email'    => $this->user->email,
                'token'    => $this->user->registration_token,
                'password' => $this->password,
            ])
            ->from(Settings::getConfig()->email, Settings::getConfig()->fullname)
            ->subject(Settings::getConfig()->fullname .' | Confirmación de Registro')
            ->to($this->user->email, $this->user->fullname);
    }
}
