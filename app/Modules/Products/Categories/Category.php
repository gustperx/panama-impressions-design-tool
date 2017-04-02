<?php

namespace App\Modules\Products\Categories;

use App\Modules\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
