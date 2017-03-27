@extends('base.page')

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/panel.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
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

{{-- Page content --}}
@section('content')

    @can('isRoot')
        @include('panel.menu.root.menu')
    @endcan

    @can('isAdmin')
        @include('panel.menu.admin.menu')
    @endcan

@stop