<?php

namespace App\Modules\Products\Categories;

use App\Modules\ModelBase;
use App\Modules\Products\Designs\ProductDesign;
use App\Modules\Products\Product;

class Category extends ModelBase
{
    protected $fillable = ['title', 'type'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function designs()
    {
        return $this->hasMany(ProductDesign::class);
    }
}
