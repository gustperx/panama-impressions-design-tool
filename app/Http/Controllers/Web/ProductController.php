<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        return view('web.products.index');
    }

    public function categories()
    {
        return view('web.products.category');
    }

    public function single()
    {
        return view('web.products.single');
    }

}
