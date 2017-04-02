@extends('base.page')

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/panel.css') }}
    {{ Html::style('/vendor/plugins/sweetalert/css/sweetalert.css') }}
    @include('layouts.builder.dataTable.assets.css')
@stop

{{-- Page content --}}
@section('content')
    @include('layouts.builder.dataTable.table')

    @include('layouts.builder.components.html.form.form_multiple_actions')
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    @include('layouts.builder.dataTable.assets.js')

    {{ Html::script('/vendor/plugins/sweetalert/js/sweetalert.min.js') }}

    {{ Html::script('/app/http.js') }}
    {{ Html::script('/app/helper_functions.js') }}
    {{ Html::script('/app/button_events.js') }}

    <script type="application/javascript">
        create($("#form_create"));
        edit($("#form_edit"));
        show($("#form_show"));
        load($("#form_load"));
        trash($("#form_thash"));
        recycled($("#form_recycled"));
        destroy($("#form_destroy"));
        restore($("#form_restore"));
        banned($("#form_banned"));
        permitted($("#form_permitted"));
        publish($("#form_publish"));
        draft($("#form_draft"));
    </script>
@stop