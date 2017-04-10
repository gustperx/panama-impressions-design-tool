<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    
    public function index()
    {
        return view('web.home');
    }

    public function car()
    {
        return view('web.home');
    }
}
