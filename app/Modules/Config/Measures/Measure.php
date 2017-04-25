<?php

namespace App\Modules\Config\Measures;

use App\Modules\ModelBase;
use App\Modules\Products\Product;

class Measure extends ModelBase
{
    protected $fillable = ['title', 'orientation', 'high', 'width'];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('product_id','measure_id', 'sale_price', 'quantity');
    }
}
