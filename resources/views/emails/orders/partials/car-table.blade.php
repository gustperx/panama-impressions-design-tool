<table class="table table-bordered table-hover table-responsive">

    <thead>
    <tr>
        <th>Producto</th>
        <th>Descripción</th>
        <th>Oferta</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Sub-total</th>
    </tr>
    </thead>

    <tbody>

    @php($total = 0)

    @foreach($order->details as $detail)

        <tr data-id="{{ $detail->id }}">

            <td width="100px">
                <div class="col-md-12">
                    <img src="{{ asset("storage/".$detail->model->thumbnail) }}" class="img-responsive" alt="{{ $detail->model->title }}">
                </div>
            </td>

            <td>{{ $detail->model->title }}</td>

            <td>
                @if($detail->measures($detail->measure_id))

                    @php($measure = $detail->measures($detail->measure_id))

                    ({{ $measure->pivot->quantity }} unidades)
                    (<strong>{{ $measure->title }}</strong> - {{ $measure->high }} x {{ $measure->width }} {{ Settings::getGeneralConfig()->unit_measurement }})

                @else

                    Precio Unitario

                @endif
            </td>

            <td>
                {{ Settings::getGeneralConfig()->coin }} {{ $detail->sale_price }}
            </td>

            <td>
                {{ $detail->quantity }}
            </td>

            <td>
                {{ Settings::getGeneralConfig()->coin }} {{ ($detail->sale_price * $detail->quantity) }}
            </td>

        </tr>

        @php($total = $total + ($detail->sale_price * $detail->quantity))

    @endforeach

    <tr>
        <td colspan="5" align="right"><h4>Total</h4></td>
        <td colspan="3" class="text-danger"><h4><strong>{{ Settings::getGeneralConfig()->coin }} {{ $total }}</strong></h4></td>
    </tr>

    </tbody>

</table>