<?php

namespace App\Modules\Products\Designs;

use Illuminate\Database\Eloquent\Model;

class ProductLayer extends Model
{
    protected $fillable = [
        
        'title',
        'source',
        'parameters',
        'product_view_id',
    ];
}
