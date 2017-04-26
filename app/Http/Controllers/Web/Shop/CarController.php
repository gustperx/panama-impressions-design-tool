<?php

namespace App\Http\Controllers\Web\Shop;

use App\Modules\Products\Categories\Category;
use App\Modules\Products\Models\ProductModel;
use App\Modules\Shop\Builder\Designer\HtmlBuilder;
use App\Modules\Shop\Orders\Order;
use App\Modules\Web\Builder\HtmlBuilder as WebHtmlBuilder;
use App\Modules\Shop\Orders\CarRepository;
use App\Modules\Shop\Orders\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Styde\Html\Facades\Alert;

class CarController extends Controller
{
    private $productModel;

    private $carRepository;
    
    private $htmlBuilder;

    private $webBuilder;

    private $webBreadcrumb;

    public function __construct(
        ProductModel $productModel, 
        CarRepository $carRepository, 
        HtmlBuilder $htmlBuilder,
        WebHtmlBuilder $builder)
    {
        $this->productModel  = $productModel;
        $this->carRepository = $carRepository;
        $this->htmlBuilder   = $htmlBuilder;
        $this->webBuilder    = $builder;
        $this->webBreadcrumb = true;
    }

    public function index()
    {
        $order = $this->carRepository->getProductsCar(Auth::user());
        
        $breadcrumb = $this->webBuilder->breadcrumbCar();

        return view('web.products.car', compact('order', 'breadcrumb'))->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }
    
    public function add(Request $request)
    {
        if (Auth::user()->can('isClient')) {

            if(Auth::user()->can('isVerified')) {

                //dd($request->all());

                // get order
                $order = $this->carRepository->getCar(Auth::user());

                // get product model
                $productModel = $this->productModel->query()->findOrFail($request->get('product_model_id'));

                // add product to order
                $detail = $this->carRepository->addProductToCar($order, $productModel, $request);

                if ($detail == 'created') {

                    Alert::warning(trans('products.front.shop.car.add_created', ['name' => $productModel->title]));

                    $message = [

                        'title'   => trans('products.front.shop.car.add_not'),

                        'message' => trans('products.front.shop.car.add_created', ['name' => $productModel->title]),

                        'type'    => 'info'
                    ];

                } else {

                    Alert::success(trans('products.front.shop.car.add_product', ['name' => $productModel->title]));

                    $message = [

                        'title'   => trans('products.front.shop.car.add'),

                        'message' => trans('products.front.shop.car.add_product', ['name' => $productModel->title]),

                        'type'    => 'success'
                    ];
                }

            } else {

                Alert::danger(trans('auth.register_validation.process'));

                $message = [

                    'title'   => trans('auth.register_validation.index'),

                    'message' => trans('auth.register_validation.process'),

                    'type'    => 'error'
                ];
            }
            
        } else {

            Alert::danger(trans('auth.client.process'));

            $message = [

                'title'   => trans('auth.client.index'),

                'message' => trans('auth.client.process'),

                'type'    => 'error'
            ];
        }
        
        if ($request->ajax()) {

            return response()->json($message, 200);

        } else {

            return back();
        }
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
    
    public function designer(OrderDetail $orderDetail)
    {
        $productModel = $orderDetail->model;

        $categories = Category::with('designs')->where('type', 'design')->get();

        $view_dataTable        = $this->htmlBuilder->buttonsDesigner($orderDetail);

        $multiple_form_actions = $this->htmlBuilder->dataTableMultipleFormActionsDesigner($orderDetail);

        $breadcrumb            = $this->htmlBuilder->breadcrumbDesigner($productModel);

        $design                = 'clientProductDesign';

        return view('panel.form.designer', compact(
            'productModel',
            'categories',
            'view_dataTable',
            'breadcrumb',
            'multiple_form_actions',
            'design'
        ))->with(['webBreadcrumb' => $this->webBreadcrumb]);
    }

    public function save(Request $request, OrderDetail $orderDetail)
    {
        $orderDetail->variation = $request->get('fpd-product-variation');
        
        $orderDetail->save();

        $message = [

            'title'   => trans('products.front.shop.car.variation'),

            'message' => trans('products.front.shop.car.save_variation', ['name' => $orderDetail->model->title]),

            'type'    => 'success'
        ];

        return response()->json($message, 200);
    }

    public function load(OrderDetail $orderDetail)
    {
        if($orderDetail->variation) {

            $message = [

                'title'   => trans('products.front.shop.car.variation'),

                'message' => trans('products.front.shop.car.load_success', ['name' => $orderDetail->model->title]),

                'type'    => 'success'
            ];
            
            $data = ['event' => 'fpd-load', 'message' => $message, 'fpd_data' => stripslashes($orderDetail->variation)];

        } else {

            $message = [

                'title'   => trans('products.front.shop.car.variation'),

                'message' => trans('products.front.shop.car.load_error', ['name' => $orderDetail->model->title]),

                'type'    => 'error'
            ];
            
            $data = ['event' => 'fpd-load', 'message' => $message, 'fpd_data' => null];

        }
        
        return response()->json($data, 200);
    }
    
    public function process(Request $request, Order $order)
    {
        $order->status = 2;
        
        $order->save();

        $data = ['event' => 'redirect', 'redirect' => route('web.orders.home')];

        return response()->json($data, 200);
    }
}
