<?php

namespace App\Http\Controllers\Panel\Config\General;

use App\Modules\Config\Generals\General;
use App\Modules\Config\Generals\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class GeneralController extends Controller
{
    private $htmlBuilder;

    private $general;

    public function __construct(HtmlBuilder $htmlBuilder, General $general)
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->general     = $general;
    }

    public function index()
    {
        $model      = $this->general->first();

        $breadcrumb = $this->htmlBuilder->breadcrumbIndex();

        $form       = $this->htmlBuilder->formBuilder();

        $dynamic    = ['type' => 'model', 'route' => 'config.general.update', 'title' => "Mi Configuración"];

        return view('panel.form.dynamic', compact('model', 'breadcrumb', 'form', 'dynamic'));
    }

    public function update(Request $request, General $general)
    {
        $this->validate($request, [
            'coin'             => 'required|string|max:50|min:1',
            'unit_measurement' => 'required|string|max:50|min:1',
        ]);

        $general->update($request->all());

        Alert::success("Actualización finalizada");

        return redirect()->back();
    }
}
