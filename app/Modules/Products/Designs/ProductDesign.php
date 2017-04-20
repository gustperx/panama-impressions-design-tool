<?php

namespace App\Modules\Products\Designs;

use App\Modules\ModelBase;

class ProductDesign extends ModelBase
{
    protected $fillable = [
        
        'title',
        'source',
        'parameters',
        'category_id'
    ];
}
