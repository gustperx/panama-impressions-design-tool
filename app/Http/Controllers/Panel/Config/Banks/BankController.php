<?php

namespace App\Http\Controllers\Panel\Config\Banks;

use App\DataTables\Panel\Configs\Banks\BankDataTable;
use App\Modules\Config\Banks\Bank;
use App\Modules\Config\Banks\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class BankController extends Controller
{
    private $htmlBuilder;

    private $bank;

    public function __construct(
        HtmlBuilder $htmlBuilder,
        Bank $bank
    )
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->bank        = $bank;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\Panel\Configs\Banks\BankDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BankDataTable $dataTable)
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

        $form       = $this->htmlBuilder->formBuilder([1 => 'Ahorro', 2 => 'Corriente']);

        $dynamic    = ['type' => 'open', 'route' => 'config.bank.create', 'title' => "Nuevo"];

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
            'name'    => 'required|string|max:100',
            'code'    => 'required|string|max:100',
            'account' => 'required',
        ]);

        $bank = $this->bank->create($request->all());

        Alert::success("Banco {$bank->name} creado satisfactoriamente");

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Modules\Config\Banks\Bank $bank
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        $model      = $bank;

        $breadcrumb = $this->htmlBuilder->breadcrumbEdit();

        $form       = $this->htmlBuilder->formBuilder([1 => 'Ahorro', 2 => 'Corriente']);

        $dynamic    = ['type' => 'model', 'route' => 'config.bank.update', 'title' => "Actualizar banco: $bank->name"];

        return view('panel.form.dynamic', compact('breadcrumb', 'form', 'model', 'dynamic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Modules\Config\Banks\Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $this->validate($request, [
            'name'    => 'required|string|max:100',
            'code'    => 'required|string|max:100',
            'account' => 'required',
        ]);

        $bank->update($request->all());

        Alert::success("Banco {$bank->name} actualizado satisfactoriamente");

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

            $this->bank->query()->findOrFail($id)->delete();
        }

        return response()->json($destroy_ids, 200);
    }
}
