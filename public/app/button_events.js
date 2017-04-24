function create(form_event) {

    $("#button_create").click(function (event) {

        redirect(form_event.attr('action'));
    });
}

function edit(form_event) {

    $("#button_edit").click(function (event) {

        if(validCheckboxChecked()){

            redirect(form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked()));
        }
    });
}

function show(form_event) {

    $("#button_show").click(function (event) {

        if(validCheckboxChecked()){

            redirect(form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked()));
        }
    });
}

function load(form_event) {

    $("#button_load").click(function (event) {

        if(validCheckboxChecked()){

            redirect(form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked()));
        }
    });
}

function action_redirect(form_event) {

    $("#button_redirect").click(function (event) {

        if(validCheckboxChecked()){

            redirect(form_event.attr('action').replace(':RECORD_ID', getCheckboxChecked()));
        }
    });
}

function trash(form_event) {

    $("#button_trash").click(function (event) {

        if(validCheckboxCheckedMultiple()){

            swal({
                    title: "Mover a la papelera ?",
                    text: "Los registros en la papelera puede ser restaurados.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, Mover!",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false
                },
                function(){

                    $("#trash_ids").val(getCheckboxChecked());

                    // url
                    var url = form_event.attr('action');
                    
                    // serialize form to send
                    var dataString = form_event.serialize();

                    var message = {
                        title: "Buen trabajo!",
                        body: "Los registros han sido enviados a la papelera.",
                        type: "success"
                    };

                    ajaxPost(url, dataString, message);
                });
        }
    });
}

function recycled(form_event) {

    $("#button_recycled").click(function (event) {

        redirect(form_event.attr('action'));
    });
}

function destroy(form_event) {

    $("#button_destroy").click(function (event) {

        if(validCheckboxCheckedMultiple()){

            swal({
                    title: "Eliminar registros ?",
                    text: "Usted no será capaz de recuperar este registro !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false
                },
                function(){

                    $("#destroy_ids").val(getCheckboxChecked());

                    // url
                    var url = form_event.attr('action');
                    
                    // serialize form to send
                    var dataString = form_event.serialize();

                    var message = {
                        title: "Buen trabajo!",
                        body: "Los registros han sido eliminados permanentemente.",
                        type: "success"
                    };

                    ajaxPost(url, dataString, message);
                });
        }

    });

}

function restore(form_event) {

    $("#button_restore").click(function (event) {

        if(validCheckboxCheckedMultiple()){

            swal({
                    title: "Restaurar registros ?",
                    text: "Esta opción devolverá los registros a la tabla principal !",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si, Restaurar !",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: false
                },
                function(){

                    $("#restore_ids").val(getCheckboxChecked());

                    // url
                    var url = form_event.attr('action');
                    
                    // serialize form to send
                    var dataString = form_event.serialize();

                    var message = {
                        title: "Buen trabajo!",
                        body: "Los registros han sido restaurados satisfactoriamente.",
                        type: "success"
                    };

                    ajaxPost(url, dataString, message);
                });
        }

    });
    
}

function banned(form_event) {

    $("#button_banned").click(function (event) {

        if(validCheckboxChecked()){

            swal({
                    title: "Banear usuario de la plataforma ?",
                    text: "Esta a punto de restringir el acceso a la plataforma a un usuario !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, Banear",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false
                },
                function(){

                    $("#banned_ids").val(getCheckboxChecked());

                    // url
                    var url = form_event.attr('action');
                    
                    // serialize form to send
                    var dataString = form_event.serialize();

                    var message = {
                        title: "Buen trabajo!",
                        body: "El usuario a sido baneado satisfactoriamente.",
                        type: "success"
                    };

                    ajaxPost(url, dataString, message);
                });
        }

    });

}

function permitted(form_event) {

    $("#button_permitted").click(function (event) {

        if(validCheckboxChecked()){

            swal({
                    title: "Permitir usuario en la plataforma ?",
                    text: "Esta a punto de permitir el acceso a la plataforma a un usuario !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, Permitir",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false
                },
                function(){

                    $("#permitted_ids").val(getCheckboxChecked());

                    // url
                    var url = form_event.attr('action');
                    
                    // serialize form to send
                    var dataString = form_event.serialize();

                    var message = {
                        title: "Buen trabajo!",
                        body: "El usuario a sido permitido satisfactoriamente.",
                        type: "success"
                    };

                    ajaxPost(url, dataString, message);
                });
        }

    });

}

function publish(form_event) {

    $("#button_publish").click(function (event) {

        if(validCheckboxCheckedMultiple()){

            swal({
                    title: "Publicar Registro ?",
                    text: "Desea publicar los registros seleccionados ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si, Publicar !",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: false
                },
                function(){

                    $("#publish_ids").val(getCheckboxChecked());

                    // url
                    var url = form_event.attr('action');
                    
                    // serialize form to send
                    var dataString = form_event.serialize();

                    var message = {
                        title: "Buen trabajo!",
                        body: "Los registros seleccionados han sido publicados satisfactoriamente.",
                        type: "success"
                    };

                    ajaxPost(url, dataString, message);
                });
        }

    });

}

function draft(form_event) {

    $("#button_draft").click(function (event) {

        if(validCheckboxCheckedMultiple()){

            swal({
                    title: "Ocultar Registro ?",
                    text: "Desea ocultar los registros seleccionados ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#77BF20",
                    confirmButtonText: "Si, Ocultar !",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: false
                },
                function(){

                    $("#draft_ids").val(getCheckboxChecked());

                    // url
                    var url = form_event.attr('action');
                    
                    // serialize form to send
                    var dataString = form_event.serialize();

                    var message = {
                        title: "Buen trabajo!",
                        body: "Los registros seleccionados han sido ocultados satisfactoriamente.",
                        type: "success"
                    };

                    ajaxPost(url, dataString, message);
                });
        }

    });

}