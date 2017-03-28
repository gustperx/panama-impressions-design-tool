jQuery(document).ready(function(){

    var $yourDesigner = $('#clothing-designer'),
        pluginOpts = {
            stageWidth: 1200,
            editorMode: true,
            langJSON: '/vendor/plugins/fancy-product-designer/lang/es.json',
            fonts: [
                {name: 'Helvetica'},
                {name: 'Times New Roman'},
                {name: 'Pacifico', url: '/vendor/plugins/fancy-product-designer/fonts/Pacifico.ttf'},
                {name: 'Arial'},
                {name: 'Lobster', url: 'google'}
            ],
            customTextParameters: {
                colors: false,
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
            actions:  {
                'top': ['download','print', 'snap', 'preview-lightbox'],
                'right': ['magnify-glass', 'zoom', 'reset-product', 'qr-code', 'ruler'],
                'bottom': ['undo','redo'],
                'left': ['manage-layers','info','save','load']
            }
        },

        yourDesigner = new FancyProductDesigner($yourDesigner, pluginOpts);

    //print button
    $('#print-button').click(function(){
        yourDesigner.print();
        return false;
    });

    //create an image
    $('#image-button').click(function(){
        var image = yourDesigner.createImage();
        return false;
    });

    //checkout button with getProduct()
    $('#checkout-button').click(function(){
        var product = yourDesigner.getProduct();
        console.log(product);
        return false;
    });

    //event handler when the price is changing
    $yourDesigner.on('priceChange', function(evt, price, currentPrice) {
        $('#thsirt-price').text(currentPrice);
    });

    //save image on webserver
    $('#save-image-php').click(function() {

        yourDesigner.getProductDataURL(function(dataURL) {
            $.post( "/php/save_image.php", { base64_image: dataURL} );
        });

    });

    //send image via mail
    $('#send-image-mail-php').click(function() {

        yourDesigner.getProductDataURL(function(dataURL) {
            $.post( "/php/send_image_via_mail.php", { base64_image: dataURL} );
        });

    });

});
