<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Web\Builder\HtmlBuilder;
use Illuminate\Http\Request;

class WebController extends Controller
{
    private $webBreadcrumb;
    
    private $htmlBuilder;

    public function __construct(HtmlBuilder $htmlBuilder)
    {
        $this->webBreadcrumb = true;
        $this->htmlBuilder   = $htmlBuilder;
    }

    public function index()
    {
        return view('web.home')->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }

    public function contact()
    {
        $breadcrumb = $this->htmlBuilder->breadcrumbContact();

        return view('web.contact', compact('breadcrumb'))->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }
    
    public function faq()
    {
        $breadcrumb = $this->htmlBuilder->breadcrumbFaq();

        return view('web.faq', compact('breadcrumb'))->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }
}
