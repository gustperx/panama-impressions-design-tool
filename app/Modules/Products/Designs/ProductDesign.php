<?php

namespace App\Modules\Products\Designs;

use Illuminate\Database\Eloquent\Model;

class ProductDesign extends Model
{
    protected $fillable = [
        
        'title',
        'source',
        'parameters',
        'category_id'
    ];
}
