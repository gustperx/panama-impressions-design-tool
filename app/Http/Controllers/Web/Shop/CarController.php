<?php

namespace App\Http\Controllers\Web\Shop;

use App\Modules\Products\Categories\Category;
use App\Modules\Products\Models\ProductModel;
use App\Modules\Shop\Builder\HtmlBuilder;
use App\Modules\Shop\Orders\CarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    private $productModel;

    private $carRepository;
    
    private $htmlBuilder;

    public function __construct(
        ProductModel $productModel, 
        CarRepository $carRepository, 
        HtmlBuilder $htmlBuilder)
    {
        $this->productModel  = $productModel;

        $this->carRepository = $carRepository;
        $this->htmlBuilder = $htmlBuilder;
    }

    public function index()
    {
        $order = $this->carRepository->getProductsCar(Auth::user());

        return view('web.products.car', compact('order'));
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

    public function remove(Request $request)
    {
        $this->carRepository->removeElementToCar($request->get('order_detail_id'));

        $message = [

            'title'   => trans('products.front.shop.car.remove'),

            'message' => trans('products.front.shop.car.remove_product'),

            'type'    => 'success'
        ];

        return response()->json($message, 200);
    }
    
    public function designer(ProductModel $productModel)
    {
        $categories = Category::with('designs')->where('type', 'design')->get();

        $view_dataTable        = $this->htmlBuilder->buttonsDesigner();

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActionsDesigner($productModel);

        $breadcrumb            = $this->htmlBuilder->breadcrumbDesigner($productModel);

        $design                = 'clientProductDesign';

        return view('panel.form.designer', compact(
            'productModel',
            'categories',
            'view_dataTable',
            //'breadcrumb',
            'multiple_form_actions',
            'design'
        ));
    }
}
