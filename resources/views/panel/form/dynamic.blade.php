@extends('base.page')

{{-- Page title --}}
@section('title')

    @if(isset($title))
        {{ $title }}
    @endif

    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    {{ Html::style('/vendor/plugins/sweetalert/css/sweetalert.css') }}

    {{ Html::style('vendor/plugins/select2/css/select2.min.css') }}

    {{ Html::style('/vendor/plugins/jasny-bootstrap/css/jasny-bootstrap.css') }}

    <style>
        .error {
            color: red;
        }
    </style>

@stop

{{-- Page content --}}
@section('content')

    @include('layouts.builder.components.html.form.form_builder', [

        'type'  => isset($dynamic['type']) ? $dynamic['type'] : '',

        'title' => isset($dynamic['title']) ? $dynamic['title'] : '',

        'attributes'  => [

            'route'  => isset($dynamic['route']) ? $dynamic['route'] : '',

            'model'  => isset($model) ? $model : '',

            'files'  => isset($dynamic['files']) ? true : false,

            'class'  => isset($dynamic['class']) ? $dynamic['class'] : '',

            'id'     => isset($dynamic['id']) ? $dynamic['id'] : '',
        ],

        'form' => $form
    ])

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    {{ Html::script('/vendor/plugins/sweetalert/js/sweetalert.min.js') }}

    {{ Html::script('/vendor/plugins/jquery-validation/jquery.validate.min.js') }}
    {{ Html::script('/vendor/plugins/jquery-validation/additional-methods.min.js') }}
    {{ Html::script('/vendor/plugins/jquery-validation/localization/messages_es.min.js') }}

    {{ Html::script('/vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}

    {{ Html::script('vendor/plugins/ckeditor/ckeditor.js') }}

    {{ Html::script('/vendor/plugins/select2/js/select2.js') }}

    {{ Html::script('/vendor/plugins/jasny-bootstrap/js/jasny-bootstrap.js') }}

    @include('layouts.components.form_maxlength')

    @include('layouts.components.form_validation')

    <script>
        $('select').select2({
            tags: true,
            tokenSeparators: [',']
        });
    </script>

@stop