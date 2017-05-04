<?php

namespace App\Mail\Orders;

use App\Modules\Auth\User;
use App\Modules\Payments\Payment;
use App\Modules\Shop\Orders\Order;
use Facades\App\Facades\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPayment extends Mailable
{
    use Queueable, SerializesModels;

    private $order;

    private $user;
    
    private $payment;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @param Payment $payment
     * @param User $user
     */
    public function __construct(Order $order, Payment $payment, User $user)
    {
        $this->order = $order;
        $this->user = $user;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.payment')
            ->with([
                'order'   => $this->order,
                'payment' => $this->payment,
                'user'    => $this->user
            ])
            ->from($this->user->email, $this->user->fullname)
            ->subject(Settings::getConfig()->fullname . ' | Pago Registrado')
            ->to(Settings::getConfig()->email, Settings::getConfig()->fullname)
            ->bcc($this->user->email, $this->user->fullname);
    }
}
