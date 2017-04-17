<!-- Address Section Start -->
<div class="col-md-6 col-sm-6" id="address_margt">

    {{--
    <div class="media media-right">

        <div class="media-left media-top">
            <a href="#">
                <div class="box-icon">
                    <i class="livicon" data-name="home" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                </div>
            </a>
        </div>

        <div class="media-body">

            <h3 class="media-heading">Dirección:</h3>

            <address>
                <h3>
                    Pediatric Surgeons of Alaska
                    <br> 3340 Providence Drive #565
                    <br> Anchorage, AK(Alaska)
                    <br> North Las Vegas, NV
                </h3>
            </address>
        </div>

    </div>
    --}}

    <div class="media padleft10">

        <div class="media-left media-top">
            <a href="#">
                <div class="box-icon">
                    <i class="livicon" data-name="phone" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                </div>
            </a>
        </div>

        <div class="media-body padbtm2">
            <h3 class="media-heading">Teléfonos:</h3>

            <h3>
                {{ Settings::getConfig()->phone_one }}
                <br />
                {{ Settings::getConfig()->phone_two }}
            </h3>
        </div>

    </div>

</div>
<!-- //Address Section End -->