<?php

namespace App\Http\Controllers\Designer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignerController extends Controller
{

    public function index()
    {
        return view('designer.home');
    }

}
