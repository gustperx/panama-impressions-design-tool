<?php

namespace App\Http\Controllers\Web\Shop;

use App\Modules\Products\Categories\Category;
use App\Modules\Products\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $productModel;

    private $category;

    public function __construct(ProductModel $productModel, Category $category)
    {
        $this->productModel = $productModel;
        $this->category     = $category;
    }

    public function index(Request $request)
    {
        $categories  = $this->category->query()->where('type', 'product')
                                                ->pluck('title', 'id')
                                                ->toArray();

        $allProducts = $this->productModel->filterAndPaginate(
                                                $request->get('description'), // description
                                                $request->get('category_id'), // category
                                                20                            // pagination
                                            );

        return view('web.products.index', compact('categories', 'allProducts'));
    }

}
