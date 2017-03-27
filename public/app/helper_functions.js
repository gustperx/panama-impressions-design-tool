function getCheckboxChecked() {
    // get all the checkboxes on the form and store them in an array
    var checkboxValues = new Array();
    // we travel all the checkbox selected .each
    $('input[name="data_check_ids[]"]:checked').each(function() {
        //$(this).val() is the value of the corresponding checkbox
        checkboxValues.push($(this).val());
    });

    return checkboxValues;
}

function validCheckboxChecked() {

    if((getCheckboxChecked().length === 1)) {

        return true;

    } else {

        swal('Selección Simple', 'Por favor, seleccione un elemento de la tabla.', 'error');
    }
}

function validCheckboxCheckedMultiple() {

    if((getCheckboxChecked().length >= 1)) {

        return true;

    } else {

        swal('Selección Múltiple', 'Por favor, seleccione al menos un elemento de la tabla.', 'error');
    }
}

function redirect(url) {

    location.href = url;
}