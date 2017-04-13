<!-- Include js files-->
{{ Html::script('/assets/js/jquery.min.js') }}
{{ Html::script('/assets/js/jquery-ui.min.js') }}

<!-- HTML5 canvas library - required -->
{{ Html::script('/vendor/plugins/fancy-product-designer/js/fabric.min.js') }}

<!-- The plugin itself - required -->
{{ Html::script('/vendor/plugins/fancy-product-designer/js/FancyProductDesigner-all.min.js') }}

<!-- Config -->
@if($design == 'adminCreateModel')

    {{ Html::script('/app/designer/admin-config-editorMode.js') }}

@elseif($design == 'adminViewModels')

    {{ Html::script('/app/designer/admin-config-productVariation.js') }}

@elseif($design == 'clientProductDesign')

    {{ Html::script('/app/designer/client-config.js') }}

@endif