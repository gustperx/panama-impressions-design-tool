@component('mail::message')
# Pago registrado a favor de la orden Nro. {{ $order->id }}

El cliente {{ $user->fullname }} ha registrado un pago por un monto de {{ Settings::getGeneralConfig()->coin }} {{ $payment->amount }} a favor de la orden Nro. {{ $order->id }}.

Gracias,<br>
{{ Settings::getConfig()->fullname }}
@endcomponent
