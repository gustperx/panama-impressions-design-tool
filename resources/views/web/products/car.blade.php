@extends('base.page')

{{-- Page title --}}
@section('title')
    Carrito de Compras
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/pages/tables.css') }}
    {{ Html::style('/assets/css/frontend/panel.css') }}
    {{ Html::style('/vendor/plugins/sweetalert/css/sweetalert.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/vendor/plugins/sweetalert/js/sweetalert.min.js') }}
    {{ Html::script('/app/helper_functions.js') }}
    {{ Html::script('/app/http.js') }}
    {{ Html::script('/app/shop/shop.js') }}
    <script type="text/javascript">
        $('.showhide').attr('title','Hide Panel content');
        $(document).on('click', '.panel-heading .clickable', function(e){
            var $this = $(this);
            if(!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
                $('.showhide').attr('title','Show Panel content');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                $('.showhide').attr('title','Hide Panel content');
            }
        });
    </script>
@stop

@section('content')

    @if($order)

        <h3> {{ trans('products.front.shop.car.nro_order', ['nro' => $order->id]) }} </h3>

        <div class="panel panel-primary">

            <div class="panel-heading">

                <h3 class="panel-title">

                    <i class="livicon" data-name="car" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>

                    Productos en el carrito de compras

                </h3>

                <span class="pull-right clickable">
                    <i class="glyphicon glyphicon-chevron-up"></i>
                </span>

            </div>

            <div class="panel-body">

                @include('web.products.partials.car-table')

                <!-- Remove -->
                {!! Form::open(['route' => ['web.car.remove'], 'method' => 'POST', 'id' => 'form_remove_product_to_car']) !!}
                    {!! Field::hidden('order_detail_id', null, ['id' => 'order_detail_id']) !!}
                {!! Form::Close() !!}

                <!-- Process -->
                {!! Form::open(['route' => ['web.car.process', $order->id], 'method' => 'POST', 'id' => 'form_finish_car']) !!}
                {!! Form::Close() !!}

            </div>

        </div>

        @if($order->status == 1)
            <div align="right">
                <button class="btn btn-primary btn-finish-car"> Procesar </button>
            </div>
        @endif

        <br><br>

    @else

        <h2>
            No ha agregado productos al carrito de compras
        </h2>
    @endif

@stop
