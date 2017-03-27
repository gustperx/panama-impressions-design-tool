<script type="text/javascript">

    $("#form").validate({

        lang: 'es',

        submitHandler: function(form){

            //ajaxPost($("form").attr('action'),$("form").serialize())

            //alert('Paso la validation');

            form.submit();
        },

        //errorClass: "state-error",

        //validClass: "state-success",

        //errorElement: "em",

        {{-- @yield("validation_rules") --}}

        @include('layouts.validations.rules')

    });

</script>