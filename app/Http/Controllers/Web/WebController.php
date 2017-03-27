<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index()
    {
        return view('web.home');
    }

    public function contact()
    {
        return view('web.contact');
    }
    
    public function faq()
    {
        return view('web.faq');
    }
}
