<?php

namespace App\Http\Controllers\Panel\Products;

use App\DataTables\Panel\Products\ProductDataTable;
use App\Modules\Products\Categories\Category;
use App\Modules\Products\HtmlBuilder;
use App\Modules\Products\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class ProductController extends Controller
{
    private $htmlBuilder;

    private $product;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Product $product
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->product     = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Products\ProductDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions();

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex();

        return $dataTable->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->where('type', 'product')->pluck('title', 'id')->toArray();

        $breadcrumb = $this->htmlBuilder->breadcrumbCreate();

        $form       = $this->htmlBuilder->formBuilder($categories);

        $dynamic    = ['type' => 'open', 'route' => 'products.store.create', 'title' => "Nuevo Producto"];

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
            'title'       => 'required|string|max:100|unique:products,title',
            'unit_price'  => 'required|numeric|max:1000000000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = $this->product->create([
            'title'       => $request->get('title'),
            'slug'        => str_slug($request->get('title')),
            'unit_price'  => $request->get('unit_price'),
            'category_id' => $request->get('category_id'),
        ]);

        Alert::success(trans('products.product.create', ['title' => $product->title]));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Products\Product  $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return redirect()->route('products.model.home', [$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modules\Products\Product  $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->where('type', 'product')->pluck('title', 'id')->toArray();

        $model      = $product;

        $breadcrumb = $this->htmlBuilder->breadcrumbEdit();

        $form       = $this->htmlBuilder->formBuilder($categories);

        $dynamic    = ['type' => 'model', 'route' => 'products.store.update', 'title' => "Actualizar producto: $product->title"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'model', 'dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @param  \App\Modules\Products\Product  $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title'       => 'required|string|max:100|unique:products,title,'. $product->id,
            'unit_price'  => 'required|numeric|max:1000000000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update([
            'title'       => $request->get('title'),
            'slug'        => str_slug($request->get('title')),
            'unit_price'  => $request->get('unit_price'),
            'category_id' => $request->get('category_id'),
        ]);

        Alert::info(trans('products.product.update', ['title' => $product->title]));

        return back();
    }

    /**
     * Publish the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request)
    {
        $publish_ids = explode(',', $request->get('publish_ids'));

        foreach ($publish_ids as $id) {

            $this->product->query()->findOrFail($id)->update(['status' => 'publish']);
        }

        return response()->json($publish_ids, 200);
    }

    /**
     * Draft the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function draft(Request $request)
    {
        $draft_ids = explode(',', $request->get('draft_ids'));

        foreach ($draft_ids as $id) {

            $this->product->query()->findOrFail($id)->update(['status' => 'draft']);
        }

        return response()->json($draft_ids, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $destroy_ids = explode(',', $request->get('destroy_ids'));

        foreach ($destroy_ids as $id) {

            $this->product->query()->findOrFail($id)->delete();
        }

        return response()->json($destroy_ids, 200);
    }
    
    public function load(Product $product)
    {
        $categories = Category::query()->with('designs')->where('type', 'design')->get();

        $view_dataTable        = $this->htmlBuilder->buttonsDesigner();

        $multiple_form_actions = $this->htmlBuilder->multipleFormActionsDesigner();

        $breadcrumb            = $this->htmlBuilder->breadcrumbDesigner();

        $design = 'adminViewModels';

        return view('panel.form.designer', compact(
                                                'product',
                                                'categories',
                                                'view_dataTable',
                                                'breadcrumb',
                                                'multiple_form_actions',
                                                'design'
                                            ));
    }
}
