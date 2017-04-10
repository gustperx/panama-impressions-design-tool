<?php

namespace App\Http\Controllers\Web;

use App\Modules\Products\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $allProducts = ProductModel::query()->whereHas('product', function ($query) {

            $query->where('status', 'publish');

        })->where('status', 'publish')->paginate(20);

        return view('web.products.index', compact('allProducts'));
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
