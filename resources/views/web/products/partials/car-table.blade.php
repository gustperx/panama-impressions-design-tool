<table class="table table-bordered table-hover table-responsive">

    <thead>
        <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Oferta</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub-total</th>
            <th>Diseño</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    @php($total = 0)

    @php($item = 1)

    @foreach($order->details as $detail)

        <tr data-id="{{ $detail->id }}">

            <td>{{ $item }}</td>

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

            <td>
                @if($detail->variation)
                    SI
                @else
                    NO
                @endif
            </td>

            <td>
                <div class="buttongroup" align="center">

                    <div class="button-group">

                        <a href="{{ route('web.car.designer', [$detail->id]) }}" class="btn btn-pill btn-primary" title="Crear diseño personalizado">

                            <i class="livicon" data-name="new-window" data-size="25" data-loop="true" data-c="#fff" data-hc="white"></i>

                        </a>

                        @if($order->status == 1)
                            <button type="button" class="btn btn-pill btn-danger btn-remove-product-to-car" title="Eliminar">

                                <i class="livicon" data-name="remove" data-size="25" data-loop="true" data-c="#fff" data-hc="white"></i>

                            </button>
                        @endif

                    </div>

                </div>
            </td>

        </tr>

        @php($total = $total + ($detail->sale_price * $detail->quantity))

        @php($item = $item + 1)

    @endforeach

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><h4>Total</h4></td>
        <td class="text-danger"><h4><strong>{{ Settings::getGeneralConfig()->coin }} {{ $total }}</strong></h4></td>
        <td></td>
        <td></td>
    </tr>

    </tbody>

</table>