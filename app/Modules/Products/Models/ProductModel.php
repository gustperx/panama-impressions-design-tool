<?php

namespace App\Modules\Products\Models;

use App\Modules\Products\Product;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $fillable = [
        
        'title',
        'thumbnail',
        'view',
        'status',
        'product_id'
    ];
    
    public function layers()
    {
        return $this->hasMany(ProductLayer::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
