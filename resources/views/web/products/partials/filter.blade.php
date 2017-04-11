<div class="row">

    {!! Form::model(Request::all(), ['route' => 'web.products.home', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}

    <div class="form-group">

        {!! Field::text('description', ['max' => 50, 'ph' => trans('validation.attributes.description')]) !!}

        {!! Field::select('category_id', $categories, ['empty' => 'Seleccione una Categoría']) !!}

    </div>
    <br><br>
    {!! Form::submit('Filtrar', ['class' => 'btn btn-block btn-primary']) !!}

    {!! Form::close() !!}

</div>