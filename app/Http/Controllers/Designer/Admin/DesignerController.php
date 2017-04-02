<?php

namespace App\Http\Controllers\Designer\Admin;

use App\Modules\Products\Designs\ProductLayer;
use App\Modules\Products\Designs\ProductView;
use App\Modules\Products\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignerController extends Controller
{
    public function index(ProductView $productView)
    {
        return view('designer.admin.layer', compact('productView'));
    }

    public function save(Request $request, ProductView $productView)
    {
        // decode json
        $json = json_decode($request->get('layers'));

        $save = [];

        foreach ($json as $item) {

            $init = 1;

            foreach ($item->elements as $value) {

                if ($init == 1) {

                    $param = [
                        'left'   => $value->parameters->left,
                        'top'    => $value->parameters->top,
                        'colors' => '#000',
                    ];

                } else {

                    $param = [
                        'left'   => $value->parameters->left,
                        'top'    => $value->parameters->top,
                    ];
                }

                $save[] = ProductLayer::create([
                    'title'           => $value->title,
                    'source'          => $value->source,
                    'parameters'      => json_encode($param),
                    'product_view_id' => $productView->id
                ]);

                $init++;
            }

        }

        return response()->json($save, 200);
    }

    public function load(Product $product)
    {
        return view('designer.admin.load', compact('product'));
    }
}
