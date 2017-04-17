<?php

namespace App\Mail\Contact;

use Facades\App\Facades\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Request
     */
    private $request;

    /**
     * Create a new message instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        //
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.communication.contact')
            ->with(['body' => $this->request->get('message')])
            ->from($this->request->get('email'), $this->request->get('name'))
            ->subject(Settings::getConfig()->fullname . ' | Formulario de Contacto')
            ->to(Settings::getConfig()->email, Settings::getConfig()->fullname);
    }
}
