<table class="table table-bordered table-hover table-responsive">

    <thead>
        <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Diseño Personalizado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    @foreach($order->details as $detail)

        <tr data-id="{{ $detail->id }}">

            <td>{{ $detail->id }}</td>

            <td width="300px">
                <div class="col-md-3">
                    <img src="{{ asset("storage/".$detail->model->thumbnail) }}" class="img-responsive" alt="{{ $detail->model->title }}">
                </div>
            </td>

            <td>{{ $detail->model->title }}</td>

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

                        <button type="button" class="btn btn-pill btn-danger btn-remove-product-to-car" title="Eliminar">

                            <i class="livicon" data-name="remove" data-size="25" data-loop="true" data-c="#fff" data-hc="white"></i>

                        </button>

                    </div>

                </div>
            </td>

            <!--
                <td>
                    <span class="label label-sm label-success">Approved</span>
                </td>
            -->
        </tr>

    @endforeach

    </tbody>

</table>