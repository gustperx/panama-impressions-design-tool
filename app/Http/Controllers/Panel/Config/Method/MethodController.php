<?php

namespace App\Http\Controllers\Panel\Config\Method;

use App\DataTables\Panel\Configs\Method\MethodDataTable;
use App\Modules\Config\Methods\HtmlBuilder;
use App\Modules\Config\Methods\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class MethodController extends Controller
{
    private $htmlBuilder;

    private $method;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Method $method
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->method     = $method;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Configs\Method\MethodDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MethodDataTable $dataTable)
    {
        $view_dataTable        = $this->htmlBuilder->dataTablePanelIndex();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActions();

        $breadcrumb            = $this->htmlBuilder->breadcrumbIndex();

        return $dataTable
            ->render('panel.form.index', compact('view_dataTable', 'breadcrumb', 'multiple_form_actions'));
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

        $dynamic    = ['type' => 'open', 'route' => 'config.method.create', 'title' => "Nuevo"];

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
            'title' => 'required|string|max:100|unique:methods,title',
        ]);

        $this->method->create($request->all());

        Alert::success("Método creado satisfactoriamente");

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

            $this->method->query()->findOrFail($id)->update(['status' => 'publish']);
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

            $this->method->query()->findOrFail($id)->update(['status' => 'draft']);
        }

        return response()->json($draft_ids, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $destroy_ids = explode(',', $request->get('destroy_ids'));

        foreach ($destroy_ids as $id) {

            $this->method->query()->findOrFail($id)->delete();
        }

        return response()->json($destroy_ids, 200);
    }
}
