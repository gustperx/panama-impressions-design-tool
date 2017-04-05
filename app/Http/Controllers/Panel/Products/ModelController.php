<?php

namespace App\Http\Controllers\Panel\Products;

use App\DataTables\Panel\Products\ModelDataTable;
use App\DataTables\Scopes\Panel\Products\ProductScope;
use App\Modules\Products\Models\ProductLayer;
use App\Modules\Products\Models\ProductModel;
use App\Modules\Products\Product;
use App\Modules\Products\ProductStorage;
use App\Modules\Products\Models\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class ModelController extends Controller
{
    private $htmlBuilder;

    private $productModel;

    private $productStorage;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        ProductModel $productModel,
        ProductStorage $productStorage
    )
    {
        $this->htmlBuilder    = $htmlBuilder;
        $this->productModel   = $productModel;
        $this->productStorage = $productStorage;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Products\ModelDataTable $dataTable
     *
     * @param \App\Modules\Products\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ModelDataTable $dataTable, Product $product)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions($product);

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex();

        return $dataTable->addScope(new ProductScope($product))
            ->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Modules\Products\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $breadcrumb = $this->htmlBuilder->breadcrumbCreate($product);

        $form       = $this->htmlBuilder->formBuilder($product);

        $dynamic    = ['type' => 'open', 'files' => true, 'route' => 'products.model.store', 'title' => "Nueva Vista del Producto"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'dynamic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|string|max:100',
            'product_id'  => 'required|exists:products,id',
            'thumbnail'   => 'image|max:5120',
        ]);

        $view = $this->productModel->create([
            'title'       => $request->get('title'),
            'view'        => $request->get('view'),
            'product_id'  => $request->get('product_id'),
        ]);

        if ($request->hasFile('thumbnail')) {

            // save thumbnail
            $view->thumbnail = $this->productStorage->thumbnail(Product::find($request->get('product_id')), $request->file('thumbnail'));

            $view->save();
        }

        Alert::success(trans('products.view.create'));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param   \App\Modules\Products\Models\ProductModel $productModel
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        $product = Product::findOrFail($productModel->product_id);

        $view_dataTable        = $this->htmlBuilder->buttonsDesigner();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActionsDesigner($productModel);

        $breadcrumb            = $this->htmlBuilder->breadcrumbDesigner($product);

        $design                = 'adminCreateModel';
        
        return view('panel.form.designer', compact(
                                                    'productModel', 
                                                    'view_dataTable', 
                                                    'breadcrumb', 
                                                    'multiple_form_actions', 
                                                    'design'
                                                    ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function save(Request $request, ProductModel $productModel)
    {
        // decode json
        $json = json_decode($request->get('fpd-layers'));

        foreach ($json as $item) {

            foreach ($item->elements as $value) {

                $param = [
                    'left'   => $value->parameters->left,
                    'top'    => $value->parameters->top,
                    'scaleX' => $value->parameters->scaleX,
                    'scaleY' => $value->parameters->scaleY,
                ];

                if ($value->parameters->fill) {

                    $param = array_add($param, 'colors', $value->parameters->colors);

                    $param = array_add($param, 'fill', $value->parameters->fill);
                }

                if ($value->type == 'text') {
                    
                    $param = array_add($param, 'fontFamily', $value->parameters->fontFamily);

                    $param = array_add($param, 'fontSize', $value->parameters->fontSize);

                    $param = array_add($param, 'fontStyle', $value->parameters->fontStyle);

                    $param = array_add($param, 'fontWeight', $value->parameters->fontWeight);

                    $param = array_add($param, 'stroke', $value->parameters->stroke);

                    $param = array_add($param, 'strokeWidth', $value->parameters->strokeWidth);

                    $param = array_add($param, 'textAlign', $value->parameters->textAlign);

                    $param = array_add($param, 'textDecoration', $value->parameters->textDecoration);

                    $param = array_add($param, 'zChangeable', true);

                    $param = array_add($param, 'removable', true);

                    $param = array_add($param, 'draggable', true);

                    $param = array_add($param, 'rotatable', true);

                    $param = array_add($param, 'resizable', true);
                }

                ProductLayer::create([
                    'title'            => $value->title,
                    'type'             => $value->type,
                    'source'           => $value->source,
                    'parameters'       => json_encode($param),
                    'product_model_id' => $productModel->id
                ]);

            }

        }

        $message = [

            'title'   => trans('products.generals.good-job'),

            'message' => trans('products.layers.create'),

            'type'    => 'success'
        ];

        return response()->json($message, 200);
    }
}
