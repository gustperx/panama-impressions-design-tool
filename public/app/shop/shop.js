// btn add product
$(".btn-add-to-car").click(function () {

    // load id product model in input form
    $('#product_model_id').val($(this).data("id"));

    // parameters ajax
    var form = $('#form_add_product_to_car');

    var url = form.attr('action');

    var data = form.serialize();

    // run ajax
    ajaxPostClassic(url, data)

});

// btn remove product
$(".btn-remove-product-to-car").click(function () {

    var row = $(this).parents('tr');

    $('#order_detail_id').val(row.data('id'));

    var form = $('#form_remove_product_to_car');

    var url = form.attr('action');

    var data = form.serialize();

    var resp = window.confirm("Esta seguro de remover el elemento de la lista ?");

    if (resp) {

        $.post(url, data, function(data){

            row.fadeOut();

            console.log(data);

            swal(data.title, data.message, data.type);

        }).fail(function(data){

            errors_ajax_methods(data);

            row.show();

        });
    }

});