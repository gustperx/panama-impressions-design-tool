<?php

namespace App\Http\Controllers\Panel\Products;

use App\DataTables\Panel\Products\ViewProductDataTable;
use App\DataTables\Scopes\Panel\Products\ProductScope;
use App\Modules\Products\Designs\ProductLayer;
use App\Modules\Products\Designs\ProductView;
use App\Modules\Products\Product;
use App\Modules\Products\ProductStorage;
use App\Modules\Products\View\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class ViewController extends Controller
{
    private $htmlBuilder;

    private $productView;

    private $productStorage;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        ProductView $productView,
        ProductStorage $productStorage
    )
    {
        $this->htmlBuilder    = $htmlBuilder;
        $this->productView    = $productView;
        $this->productStorage = $productStorage;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Products\ViewProductDataTable $dataTable
     *
     * @param \App\Modules\Products\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ViewProductDataTable $dataTable, Product $product)
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

        $dynamic    = ['type' => 'open', 'files' => true, 'route' => 'products.view.store', 'title' => "Nueva Vista del Producto"];

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

        $view = $this->productView->create([
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
     * @param   \App\Modules\Products\Designs\ProductView  $productView
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(ProductView $productView)
    {
        $product = Product::findOrFail($productView->product_id);

        $view_dataTable        = $this->htmlBuilder->buttonsDesigner();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActionsDesigner($productView);

        $breadcrumb            = $this->htmlBuilder->breadcrumbDesigner($product);

        $design                = 'model';
        
        return view('panel.form.designer', compact(
                                                    'productView', 
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


    public function save(Request $request, ProductView $productView)
    {
        // decode json
        $json = json_decode($request->get('fpd-layers'));

        $save = [];

        foreach ($json as $item) {

            $init = 1;

            foreach ($item->elements as $value) {

                if ($init == 1) {

                    $param = [
                        'left'   => $value->parameters->left,
                        'top'    => $value->parameters->top,
                        'colors' => '#000',
                    ];

                } else {

                    $param = [
                        'left'   => $value->parameters->left,
                        'top'    => $value->parameters->top,
                    ];
                }

                $save[] = ProductLayer::create([
                    'title'           => $value->title,
                    'source'          => $value->source,
                    'parameters'      => json_encode($param),
                    'product_view_id' => $productView->id
                ]);

                $init++;
            }

        }

        return response()->json($save, 200);
    }
}
