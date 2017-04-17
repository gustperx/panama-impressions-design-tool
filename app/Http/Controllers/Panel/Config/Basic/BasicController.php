<?php

namespace App\Http\Controllers\Panel\Config\Basic;

use App\Models\Config\Config;
use App\Modules\Config\Basic\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Styde\Html\Facades\Alert;

class BasicController extends Controller
{
    private $htmlBuilder;
    
    private $config;

    public function __construct(HtmlBuilder $htmlBuilder, Config $config)
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->config      = $config;
    }

    public function index()
    {
        $model      = $this->config->first();

        $breadcrumb = $this->htmlBuilder->breadcrumbIndex();

        $form       = $this->htmlBuilder->formBuilder();

        $dynamic    = ['type' => 'model', 'route' => 'config.basic.update', 'title' => "Mi Configuración"];

        return view('panel.form.dynamic', compact('model', 'breadcrumb', 'form', 'dynamic'));
    }

    public function update(Request $request, Config $config)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:100|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/i',
            'email'     => 'required|email|max:60|unique:configs,email,'. $config->id,
            'phone_one' => 'required|string|max:30',
            'phone_two' => 'required|string|max:30',
        ]);

        $config->update($request->all());

        Alert::success("Actualización finalizada");

        return redirect()->back();
    }
}
