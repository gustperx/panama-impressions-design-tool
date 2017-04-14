<?php

namespace App\Http\Controllers\Web\Shop;

use App\Modules\Web\Builder\HtmlBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
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
        $breadcrumb = $this->htmlBuilder->breadcrumbOrder();

        return view('web.home', compact('breadcrumb'))->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }
    
}
