<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLayer extends Model
{
    protected $fillable = [
        
        'title',
        'type',
        'source',
        'parameters',
        'product_model_id',
    ];
}
