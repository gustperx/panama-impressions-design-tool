<?php

namespace App\Http\Controllers\Panel\Config\Faq;

use App\DataTables\Panel\Configs\Faq\FaqDataTable;
use App\Modules\Config\Faqs\Faq;
use App\Modules\Config\Faqs\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class FaqController extends Controller
{
    private $htmlBuilder;

    private $faq;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Faq $faq
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->faq         = $faq;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Configs\Faq\FaqDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqDataTable $dataTable)
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

        $dynamic    = ['type' => 'open', 'route' => 'config.faq.create', 'title' => "Nuevo"];

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
            'question' => 'required|string|max:190',
            'answer'   => 'required|string',
        ]);

        $this->faq->create($request->all());

        Alert::success("F.A.Q creada satisfactoriamente");

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Modules\Config\Faqs\Faq $faq
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $model      = $faq;

        $breadcrumb = $this->htmlBuilder->breadcrumbEdit();

        $form       = $this->htmlBuilder->formBuilder();

        $dynamic    = ['type' => 'model', 'route' => 'config.faq.update', 'title' => "Actualizar F.A.Q"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'model', 'dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Modules\Config\Faqs\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'question' => 'required|string|max:190',
            'answer'   => 'required|string',
        ]);

        $faq->update($request->all());

        Alert::success("F.A.Q actualizado satisfactoriamente");

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

            $this->faq->query()->findOrFail($id)->delete();
        }

        return response()->json($destroy_ids, 200);
    }
}
