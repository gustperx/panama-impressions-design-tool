<?php

namespace App\Http\Controllers\Web\Shop;

use App\Modules\Products\Models\ProductModel;
use App\Modules\Shop\Orders\CarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    private $productModel;

    private $carRepository;

    public function __construct(ProductModel $productModel, CarRepository $carRepository)
    {
        $this->productModel  = $productModel;

        $this->carRepository = $carRepository;
    }

    public function index()
    {
        return view('web.home');
    }
    
    public function add(Request $request)
    {
        if(Auth::user()->can('isVerified')) {

            // get order
            $order = $this->carRepository->getCar(Auth::user());

            // get product model
            $productModel = $this->productModel->query()->findOrFail($request->get('product_model_id'));

            // add product to order
            $detail = $this->carRepository->addProductToCar($order, $productModel);

            if ($detail == 'created') {

                $message = [

                    'title'   => trans('products.front.shop.car.add_not'),

                    'message' => trans('products.front.shop.car.add_created', ['name' => $productModel->title]),

                    'type'    => 'info'
                ];
            
            } else {

                $message = [

                    'title'   => trans('products.front.shop.car.add'),

                    'message' => trans('products.front.shop.car.add_product', ['name' => $productModel->title]),

                    'type'    => 'success'
                ];
            }          
            
        } else {

            $message = [

                'title'   => trans('auth.register_validation.index'),

                'message' => trans('auth.register_validation.process'),

                'type'    => 'error'
            ];
        }
        
        return response()->json($message, 200);
    }
}
