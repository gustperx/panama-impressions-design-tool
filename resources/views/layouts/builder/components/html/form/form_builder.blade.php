<div class="panel panel-primary filterable">

    <div class="panel-heading clearfix">

        <div class="panel-title pull-left">

            <div class="caption">

                <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>

                {{ isset($title) ? $title : 'No a definido un titulo' }}

            </div>

        </div>

        <div class="tools pull-right"></div>

    </div>

    <div class="panel-body table-responsive">

        <div class="row">

            @if(isset($type))

                @if($type == 'open')

                    @include('layouts.builder.components.html.form.partials.form_open')

                @elseif($type == 'model')

                    @include('layouts.builder.components.html.form.partials.form_model')

                @else

                    No a definido un formulario

                @endif

            @else

                No a definido un formulario

            @endif

        </div>

    </div>

</div>