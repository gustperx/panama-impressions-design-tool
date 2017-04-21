@extends('base.page')

{{-- Page title --}}
@section('title')
    FAQ
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/faq.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{ Html::script('/assets/js/frontend/faq.js') }}
    {{ Html::script('/vendor/plugins/mixitup/jquery.mixitup.js') }}
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-group panel-accordion faq-accordion">
                        <div id="faq">

                            @foreach($faqs as $faq)

                                <div class="mix category-1 col-lg-12 panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#question{{ $loop->iteration }}">
                                                <strong class="c-gray-light">{{ $loop->iteration }}.</strong>
                                                {{ $faq->question }}
                                                <span class="pull-right">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </span>
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="question{{ $loop->iteration }}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
