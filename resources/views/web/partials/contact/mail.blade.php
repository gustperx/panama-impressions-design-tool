<!-- Contact form Section Start -->
<div class="col-md-6">
    <h2>Contacto</h2>
    <!-- Notifications -->

    <form class="contact" id="contact" action="{{route('web.contact')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
            {!! Field::text('name', ['max' => 60, 'ph' => trans('validation.attributes.name'), 'required']) !!}
        </div>
        <div class="form-group">
            {!! Field::email('email', ['max' => 60, 'ph' => trans('validation.attributes.email'), 'required']) !!}
        </div>
        <div class="form-group">
            {!! Field::textarea('message', ['ph' => trans('validation.attributes.message'), 'required']) !!}
        </div>
        <div class="input-group">
            <button class="btn btn-primary" type="submit">Enviar Email</button>
        </div>
    </form>
</div>
<!-- //Conatc Form Section End -->