<?php

namespace App\Modules\Products;

use App\Modules\Products\Categories\Category;
use App\Modules\Products\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'preview',
        'thumbnail',
        'status',
        'category_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function models()
    {
        return $this->hasMany(ProductModel::class);
    }

    public function scopeProductCategory($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }
}
