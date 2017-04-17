function order_shop_approved(form_event) {

    $("#button_shop_approved").click(function (event) {

        if(validCheckboxChecked()){

            swal({
                    title: "Aprobar Orden ?",
                    text: "Aprobar Order ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false
                },
                function(){

                    // url
                    var url = form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked());

                    // serialize form to send
                    var dataString = form_event.serialize();

                    console.log(url);

                    console.log(dataString);

                    ajaxPost(url, dataString);
                });
        }

    });

}

function order_shop_process(form_event) {

    $("#button_shop_process").click(function (event) {

        if(validCheckboxChecked()){

            swal({
                    title: "Procesar Orden ?",
                    text: "Procesar Order ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false
                },
                function(){

                    // url
                    var url = form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked());

                    // serialize form to send
                    var dataString = form_event.serialize();

                    ajaxPost(url, dataString);
                });
        }

    });

}

function order_shop_send(form_event) {

    $("#button_shop_send").click(function (event) {

        if(validCheckboxChecked()){

            swal({
                    title: "Enviar Orden al Cliente ?",
                    text: "Enviar Order al Cliente ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false
                },
                function(){

                    // url
                    var url = form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked());

                    // serialize form to send
                    var dataString = form_event.serialize();

                    ajaxPost(url, dataString);
                });
        }

    });

}

function order_shop_received(form_event) {

    $("#button_shop_received").click(function (event) {

        if(validCheckboxChecked()){

            swal({
                    title: "Orden Recibida ?",
                    text: "Order Recibida ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false
                },
                function(){

                    // url
                    var url = form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked());

                    // serialize form to send
                    var dataString = form_event.serialize();

                    ajaxPost(url, dataString);
                });
        }

    });

}

function order_shop_cancel (form_event) {

    $("#button_shop_cancel").click(function (event) {

        if(validCheckboxChecked()){

            swal({
                    title: "Cancelar Orden ?",
                    text: "Cancelar Order ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false
                },
                function(){

                    // url
                    var url = form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked());

                    // serialize form to send
                    var dataString = form_event.serialize();

                    ajaxPost(url, dataString);
                });
        }

    });
    
}