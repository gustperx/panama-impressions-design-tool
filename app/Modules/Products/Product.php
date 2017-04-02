<?php

namespace App\Modules\Products;

use App\Modules\Products\Categories\Category;
use App\Modules\Products\Designs\ProductView;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'preview',
        'thumbnail',
        'category_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function views()
    {
        return $this->hasMany(ProductView::class);
    }
}
