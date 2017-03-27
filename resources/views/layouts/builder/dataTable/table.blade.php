<div class="panel panel-primary filterable">

    <div class="panel-heading clearfix">

        @include('layouts.builder.dataTable.partials.builder-title')

    </div>

    <div class="panel-body table-responsive">

        @include('layouts.builder.dataTable.partials.builder-button-actions')

        {!! $dataTable->table(['class' => 'table table-striped table-bordered table-hover']) !!}

    </div>

</div>