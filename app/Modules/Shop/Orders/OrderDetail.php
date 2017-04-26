<?php

namespace App\Modules\Shop\Orders;

use App\Modules\Config\Measures\Measure;
use App\Modules\Products\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [

        'order_id',
        'product_model_id',
        'measure_id',
        'variation',
        'quantity',
        'sale_price',
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function model()
    {
        return $this->belongsTo(ProductModel::class, 'product_model_id');
    }

    public function measures($measure_id)
    {
        return $this->model->product->measures()->where('measure_id', $measure_id)->first();
    }
}
