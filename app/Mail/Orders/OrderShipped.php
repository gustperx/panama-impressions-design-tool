<?php

namespace App\Mail\Orders;

use App\Modules\Auth\User;
use App\Modules\Shop\Orders\Order;
use Facades\App\Facades\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    private $order;

    private $user;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     *
     * @param User $user
     */
    public function __construct(Order $order, User $user)
    {
        $this->order = $order;
        $this->user  = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.shipped')
            ->with([
                'user'  => $this->user,
                'order' => $this->order
            ])
            ->from(Settings::getConfig()->email, Settings::getConfig()->fullname)
            ->subject(Settings::getConfig()->fullname .' | Orden Enviada')
            ->to($this->user->email, $this->user->fullname);
    }
}
