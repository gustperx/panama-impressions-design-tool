@extends('base.page')

{{-- Page title --}}
@section('title')
    Contacto
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{ Html::style('/assets/css/frontend/contact.css') }}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    {{ Html::script('vendor/plugins/gmaps/js/gmaps.min.js') }}
    <!--page level js ends-->
    <script>

        $(document).ready(function() {
            var map = new GMaps({
                el: '#map',
                lat: 38.8921021,
                lng: -77.0260358
            });
            map.addMarker({
                lat: 38.8921021,
                lng: -77.0260358,
                title: 'Washington'
            });
        });
    </script>
@stop

@section('content')

    <div class="">
        <div id="map" style="width:100%; height:400px;"></div>
    </div>

    <div class="row">
        <!-- Contact form Section Start -->
        <div class="col-md-6">
            <h2>Contact Form</h2>

            <form class="contact" id="contact" action="#" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <input type="text" name="contact-name" class="form-control input-lg" placeholder="Your name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="contact-email" class="form-control input-lg" placeholder="Your email address" required>
                </div>
                <div class="form-group">
                    <textarea name="contact-msg" class="form-control input-lg no-resize resize_vertical" rows="6" placeholder="Your comment" required></textarea>
                </div>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit">submit</button>
                    <button class="btn btn-danger" type="reset">cancel</button>
                </div>
            </form>
        </div>
        <!-- //Conatc Form Section End -->
        <!-- Address Section Start -->
        <div class="col-md-6 col-sm-6" id="address_margt">
            <div class="media media-right">
                <div class="media-left media-top">
                    <a href="#">
                        <div class="box-icon">
                            <i class="livicon" data-name="home" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                        </div>
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Address:</h4>
                    <div class="danger">Jyostna</div>
                    <address>
                        Pediatric Surgeons of Alaska
                        <br> 3340 Providence Drive #565
                        <br> Anchorage, AK(Alaska)
                        <br> North Las Vegas, NV
                    </address>
                </div>
            </div>
            <div class="media padleft10">
                <div class="media-left media-top">
                    <a href="#">
                        <div class="box-icon">
                            <i class="livicon" data-name="phone" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                        </div>
                    </a>
                </div>
                <div class="media-body padbtm2">
                    <h4 class="media-heading">Telephone:</h4> (703) 717-4200
                    <br /> Fax:400 423 1456
                </div>
            </div>
        </div>
        <!-- //Address Section End -->
    </div>

@stop
