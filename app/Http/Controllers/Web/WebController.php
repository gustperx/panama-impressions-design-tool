<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\Contact\Contact;
use App\Modules\Config\Faqs\Faq;
use App\Modules\Web\Builder\HtmlBuilder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Styde\Html\Facades\Alert;

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

    public function contact_email(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|string|max:60',
            'email'   => 'required|email|max:60',
            'message' => 'required|string',
        ]);

        try {

            Mail::send(new Contact($request));

            Alert::success('Gracias, pronto te contestaremos !! ');

        } catch (Exception $exception) {

            //dd($exception);
            Alert::warning("No se a podido enviar el correo de contacto, por favor comuníquese con el administrador del sistema");
        }

        return redirect()->back();
    }
    
    public function faq()
    {
        $breadcrumb = $this->htmlBuilder->breadcrumbFaq();
        
        $faqs = Faq::all();

        return view('web.faq', compact('breadcrumb', 'faqs'))->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }
}
