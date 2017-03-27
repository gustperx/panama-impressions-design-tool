function ajaxPost(form_event, dataString, message) {

    $.ajax({
        type: "POST",
        url: form_event.attr('action'),
        data: dataString,
        cache: false,
        success: function(data) {

            console.log(data);

            swal(message.title, message.body, message.type);
            
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