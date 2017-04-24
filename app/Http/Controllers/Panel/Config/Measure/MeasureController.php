<?php

namespace App\Http\Controllers\Panel\Config\Measure;

use App\DataTables\Panel\Products\MeasureDataTable;
use App\Modules\Products\Measures\HtmlBuilder;
use App\Modules\Products\Measures\Measure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class MeasureController extends Controller
{
    private $htmlBuilder;

    private $measure;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Measure $measure
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->measure     = $measure;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Products\MeasureDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MeasureDataTable $dataTable)
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

        $form       = $this->htmlBuilder->formBuilder(['horizontal' => 'Horizontal', 'vertical' => 'Vertical']);

        $dynamic    = ['type' => 'open', 'route' => 'config.measure.create', 'title' => "Nuevo"];

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
            'title' => 'required|string|max:100|unique:measures,title',
            'high'  => 'required|numeric|max:1000000000',
            'width' => 'required|numeric|max:1000000000'
        ]);

        $this->measure->create($request->all());

        Alert::success("Medida creada satisfactoriamente");

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Modules\Products\Measures\Measure $measure
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Measure $measure)
    {
        $model      = $measure;

        $breadcrumb = $this->htmlBuilder->breadcrumbEdit();

        $form       = $this->htmlBuilder->formBuilder(['horizontal' => 'Horizontal', 'vertical' => 'Vertical']);

        $dynamic    = ['type' => 'model', 'route' => 'config.measure.update', 'title' => "Actualizar"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'model', 'dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Modules\Products\Measures\Measure $measure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measure $measure)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100|unique:measures,title,' . $measure->id,
            'high'  => 'required|numeric|max:1000000000',
            'width' => 'required|numeric|max:1000000000'
        ]);

        $measure->update($request->all());

        Alert::success("Medida actualizada satisfactoriamente");

        return back();
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

            $this->measure->query()->findOrFail($id)->delete();
        }

        return response()->json($destroy_ids, 200);
    }
}
