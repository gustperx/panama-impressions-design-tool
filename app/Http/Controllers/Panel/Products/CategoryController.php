<?php

namespace App\Http\Controllers\Panel\Products;

use App\DataTables\Panel\Products\CategoryDataTable;
use App\Modules\Products\Categories\Category;
use App\Modules\Products\Categories\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class CategoryController extends Controller
{
    private $htmlBuilder;

    private $category;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Category $category
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->category    = $category;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Products\CategoryDataTable $dataTable
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
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
        $breadcrumb = $this->htmlBuilder->breadcrumbCreate();

        $form       = $this->htmlBuilder->formBuilder();

        $dynamic    = ['type' => 'open', 'route' => 'products.categories.create', 'title' => "Nueva Categoría"];

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
        $this->validate($request, [
            'title' => 'required|string|max:100|unique:categories,title,',
        ]);

        $category = $this->category->create($request->all());

        Alert::success(trans('products.category.create', ['title' => $category->title]));

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modules\Products\Categories\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $model      = $category;

        $breadcrumb = $this->htmlBuilder->breadcrumbEdit();

        $form       = $this->htmlBuilder->formBuilder();

        $dynamic    = ['type' => 'model', 'route' => 'products.categories.update', 'title' => "Actualizar categoría: $category->title"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'model', 'dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @param  \App\Modules\Products\Categories\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100|unique:categories,title,'. $category->id,
        ]);
        
        $category->update($request->all());

        Alert::info(trans('products.category.update', ['title' => $category->title]));

        return back();
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

            $this->category->findOrFail($id)->delete();
        }
    }
}
