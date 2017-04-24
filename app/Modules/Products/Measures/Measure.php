<?php

namespace App\Modules\Products\Measures;

use App\Modules\ModelBase;

class Measure extends ModelBase
{
    protected $fillable = ['title', 'orientation', 'high', 'width'];
}
