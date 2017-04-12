<?php

namespace App\Modules\Shop\Orders;

use App\Modules\Products\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [

        'order_id',
        'product_model_id',
        'variation',
        'quantity'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function model()
    {
        return $this->belongsTo(ProductModel::class, 'product_model_id');
    }
}
