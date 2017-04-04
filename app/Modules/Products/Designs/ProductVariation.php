<?php

namespace App\Modules\Products\Designs;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $fillable = [
        
        'views',
        'status',
        'product_view_id'
    ];
}
