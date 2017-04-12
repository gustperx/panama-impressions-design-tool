<?php

namespace App\Modules\Shop\Orders;

use App\Modules\Auth\User;
use App\Modules\Products\Models\ProductModel;

class CarRepository
{
    private $order;

    private $orderDetail;

    public function __construct(Order $order, OrderDetail $orderDetail)
    {
        $this->order       = $order;

        $this->orderDetail = $orderDetail;
    }

    public function getCar(User $user)
    {
        // get order active (in car)
        $order = $this->get_order_car_active($user);

        if (is_object($order))
        {
            return $order;

        } else {

            return $this->create_order($user);
        }
    }

    private function get_order_car_active(User $user)
    {
        return $this->order->query()
                            ->where('status', 1)
                            ->where('user_id', $user->id)
                            ->first();
    }

    private function create_order(User $user)
    {
        $order = $this->order->query()->create([

            'user_id' => $user->id
        ]);

        return $this->order->query()->findOrFail($order);
    }

    public function addProductToCar(Order $order, ProductModel $productModel)
    {
        if (is_object($this->validate_detail_order($order, $productModel))) {
            
            return 'created';
            
        } else {
            
            return $this->create_detail_order($order, $productModel);
        }
    }
    
    private function validate_detail_order(Order $order, ProductModel $productModel)
    {
        return $this->orderDetail->query()
                                    ->where('order_id', $order->id)
                                    ->where('product_model_id', $productModel->id)
                                    ->first();
    }
    
    private function create_detail_order(Order $order, ProductModel $productModel)
    {
        return $this->orderDetail->query()->create([

            'order_id'         => $order->id,
            'product_model_id' => $productModel->id,
        ]);
    }
    
    public function getProductsCar(User $user)
    {
        return $this->order->query()->with('details')
                            ->where('status', 1)
                            ->where('user_id', $user->id)
                            ->first();
    }
    
    public function removeElementToCar($orderDetail_id)
    {
        $this->orderDetail->query()->findOrFail($orderDetail_id)->delete();
    }
}