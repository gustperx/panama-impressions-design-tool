<?php

namespace App\Modules\Products\Categories;

use App\Modules\Products\Designs\ProductDesign;
use App\Modules\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
