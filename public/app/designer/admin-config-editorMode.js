jQuery(document).ready(function(){

    var $fpd = $('#fpd'),
        pluginOpts = {
            stageWidth: 1200,
            stageHeight: 600,
            editorMode: true,
            initialActiveModule: "",
            mainBarModules: ['images', 'designs', 'text'],
            /*
             actions: {
                 'top': ['download','print', 'snap', 'preview-lightbox'],
                 'right': ['magnify-glass', 'zoom', 'reset-product', 'qr-code'],
                 'bottom': ['undo','redo'],
                 'left': ['manage-layers','info','save','load']
             },
             */
            fonts: [
                {name: 'Helvetica'},
                {name: 'Times New Roman'},
                {name: 'Pacifico', url: '/vendor/plugins/fancy-product-designer/fonts/Pacifico.ttf'},
                {name: 'Arial'},
                {name: 'Lobster', url: 'google'}
            ],
            toolbarPlacement: "dynamic",
            selectedColor: "#f5f5f5",
            boundingBoxColor: "#005ede",
            outOfBoundaryColor: "#990000",
            cornerIconColor: "#000000",
            customTextParameters: {
                colors: true,
                removable: true,
                resizable: true,
                draggable: true,
                rotatable: true,
                autoCenter: true,
                boundingBox: "Base"
            },
            customImageParameters: {
                draggable: true,
                removable: true,
                resizable: true,
                rotatable: true,
                colors: '#000',
                autoCenter: true,
                boundingBox: "Base"
            },

            customImageAjaxSettings: {
                url: '/fancyDesigner/custom-image-handler.php',
                data: {
                    saveOnServer: 1,
                    uploadsDir: './uploads',
                    uploadsDirURL: '/fancyDesigner/uploads'
                }
            },
            langJSON: '/vendor/plugins/fancy-product-designer/lang/es.json',
            templatesDirectory: '/vendor/plugins/fancy-product-designer/html/'
        };

    var productDesigner = new FancyProductDesigner($fpd, pluginOpts);

    //api methods can be used
    productDesigner.print();

    //you can listen to events
    $fpd.on('productCreate', function() {
        //do something
    });


    // click handler for #store-product-db
    $('#fpd_button_create').click(function() {

        // load layers in input
        $('#fpd-layers').val(JSON.stringify(productDesigner.getProduct()));

        // ajax
        var form = $('#fpd_form_save_model');

        var url = form.attr('action');

        var data = form.serialize();
        
        ajaxPost(url, data);

    });

    $('#fpd_button_parameters').click(function () {

        console.log(productDesigner.getProduct())
    });

});