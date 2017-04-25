<?php

namespace App\Http\Controllers\Panel\Products;

use App\DataTables\Panel\Products\MeasureDataTable;
use App\DataTables\Scopes\Panel\Products\MeasureProductScope;
use App\Modules\Config\Measures\Measure;
use App\Modules\Products\Measures\HtmlBuilder;
use App\Modules\Products\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class MeasureController extends Controller
{
    private $htmlBuilder;

    public function __construct(
        HtmlBuilder $htmlBuilder
    )
    {
        $this->htmlBuilder = $htmlBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Products\MeasureDataTable $dataTable
     *
     * @param \App\Modules\Products\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MeasureDataTable $dataTable, Product $product)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex($product);

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions($product);

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex($product);

        return $dataTable->addScope(new MeasureProductScope($product))
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
        $measures   = Measure::pluck('title', 'id')->toArray();
        
        $breadcrumb = $this->htmlBuilder->breadcrumbCreate($product);

        $form       = $this->htmlBuilder->formBuilder($product, $measures);

        $dynamic    = ['type' => 'model', 'route' => 'products.measure.store', 'title' => "Agregar Medida al producto {$product->title}"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'dynamic'))->with(['model' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param \App\Modules\Products\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->validate($request, [
            'measure_id' => 'required|exists:measures,id',
            'sale_price' => 'required|numeric|max:1000000000',
            'quantity'   => 'required|numeric|max:1000000000'
        ]);

        $product->measures()->detach($request->get('measure_id'));

        $product->measures()
            ->attach($request->get('measure_id'), [
                    'sale_price' => $request->get('sale_price'),
                    'quantity'   => $request->get('quantity')
                ]);

        Alert::success("Medida creada satisfactoriamente");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     *
     * @param \App\Modules\Products\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $destroy_ids = explode(',', $request->get('destroy_ids'));

        $product->measures()->detach($destroy_ids);

        return response()->json($destroy_ids, 200);
    }
}
