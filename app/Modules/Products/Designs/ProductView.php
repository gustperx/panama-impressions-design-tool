<?php

namespace App\Modules\Products\Designs;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    protected $fillable = [
        
        'title',
        'thumbnail',
        'view',
        'product_id'
    ];
    
    public function layers()
    {
        return $this->hasMany(ProductLayer::class);
    }
}
