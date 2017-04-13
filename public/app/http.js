function ajaxPost(url, dataString, message, productDesigner) {

    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        cache: false,
        success: function(data) {

            console.log(data);

            if (typeof(message) == "undefined" || ! message)
            {
                if (data.event) {

                    switch(data.event) {

                        case 'fpd-load':

                            if(data.message) {

                                swal(data.message.title, data.message.message, data.message.type);
                            }

                            if (data.fpd_data) {

                                productDesigner.loadProduct(JSON.parse(data.fpd_data));
                            }

                            break;

                        default:

                            console.log(data);

                            swal('Error desconocido', 'Por favor comuníquese con el administrador del sistema', 'error');
                    }

                } else {

                    swal(data.title, data.message, data.type);
                }
                
            } else {

                swal(message.title, message.body, message.type);
            }

        },
        error: function(data) {

            errors_ajax_methods(data);
        }
    },"json");

}

// handling errors
function errors_ajax_methods(data)
{
    switch(data.status) {

        case 403:

            console.log(data.status + " " + data.statusText);

            swal('Acción bloqueada', 'No posee los privilegios necesarios para realizar la opción seleccionada', 'info');

            break;

        case 404:

            console.log(data.status + " " + data.statusText);

            swal('No hay resultados', 'El registro seleccionado no esta disponible, por favor actualice la tabla.', 'error');

            break;

        case 422:

            console.log(data.status + " " + data.statusText);

            swal('unauthorized', 'unauthorized.', 'error');

            break;

        default:

            console.log(data);

            swal('Error desconocido', 'Por favor comuníquese con el administrador del sistema', 'error');
    }
}