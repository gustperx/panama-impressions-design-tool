<?php

namespace App\Http\Controllers\Panel\Products;

use App\DataTables\Panel\Products\DesignDataTable;
use App\Modules\Products\Categories\Category;
use App\Modules\Products\Designs\HtmlBuilder;
use App\Modules\Products\Designs\ProductDesign;
use App\Modules\Products\ProductStorage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class DesignController extends Controller
{
    private $htmlBuilder;

    private $productDesign;
    
    private $productStorage;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        ProductDesign $productDesign,
        ProductStorage $productStorage
    )
    {
        $this->htmlBuilder   = $htmlBuilder;
        $this->productDesign = $productDesign;
        $this->productStorage = $productStorage;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Products\DesignDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DesignDataTable $dataTable)
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
        $categories = Category::where('type', 'design')->pluck('title', 'id')->toArray();
        
        $breadcrumb = $this->htmlBuilder->breadcrumbCreate();

        $form       = $this->htmlBuilder->formBuilder($categories);

        $dynamic    = ['type' => 'open', 'route' => 'products.design.create', 'title' => "Cargar Diseño"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'dynamic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

        $this->validate($request, [
            'title'       => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'thumbnail'   => 'image|max:5120',
        ]);

        $param = [
            "left"        => 210,
            "top"         => 200,
            "colors"      => "#000000",
            "fill"        => "#000000",
            "removable"   => true,
            "draggable"   => true,
            "rotatable"   => true,
            "resizable"   => true,
            "scale"       => 0.25,
            "boundingBox" => "Base",
            "autoCenter"  => true
        ];
        
        $design = $this->productDesign->create([
            'title'       => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'parameters'  => json_encode($param),
        ]);

        if ($request->hasFile('thumbnail')) {

            // save thumbnail
            $design->source = $this->productStorage->source($design, $request->file('thumbnail'));

            $design->save();
        }

        Alert::success(trans('products.designs.create'));
        
        return back();
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $destroy_ids = explode(',', $request->get('destroy_ids'));

        foreach ($destroy_ids as $id) {

            $this->productDesign->findOrFail($id)->delete();
        }
    }
}
