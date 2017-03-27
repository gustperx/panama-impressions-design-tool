<script>

    $('input[type=text]').maxlength({
        alwaysShow: true,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' de ',
        preText: 'Escribiste ',
        postText: ' caracteres.',
        //placement: 'top',
        vali: true
    });
    $('input[type=password]').maxlength({
        alwaysShow: true,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' de ',
        preText: 'Escribiste ',
        postText: ' caracteres.',
        //placement: 'top',
        vali: true
    });
    $('textarea').maxlength({
        alwaysShow: true,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' de ',
        preText: 'Escribiste ',
        postText: ' caracteres.',
        //placement: 'top',
        vali: true
    });

    $(".display-no").hide();

</script>