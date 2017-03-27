<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    
    public function index()
    {
        return view('web.blog.index');
    }
    
    public function post()
    {
       return view('web.blog.post');
    }
    
}
