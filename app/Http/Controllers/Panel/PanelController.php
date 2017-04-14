<?php

namespace App\Http\Controllers\Panel;

use App\Modules\Web\Builder\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    private $htmlBuilder;

    public function __construct(HtmlBuilder $htmlBuilder)
    {
        $this->htmlBuilder   = $htmlBuilder;
    }

    public function index()
    {
        $breadcrumb = $this->htmlBuilder->breadcrumbPanel();

        return view('panel.index', compact('breadcrumb'));
    }
}
