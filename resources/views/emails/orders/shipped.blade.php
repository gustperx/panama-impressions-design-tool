@component('mail::message')

# {{ trans('products.front.shop.car.nro_order', ['nro' => $order->id]) }}

<p align="justify">
    Estimado(a) {{ $user->fullname }}, si desea incluir imágenes o diseños adicionales a sus productos por favor
    responda a este correo adjuntando los elementos que desea incluir en sus productos. Gracias
</p>

@include('emails.orders.partials.car-table')

Gracias,<br>
{{ Settings::getConfig()->fullname }}
@endcomponent
