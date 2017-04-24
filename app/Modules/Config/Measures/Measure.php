<?php

namespace App\Modules\Config\Measures;

use App\Modules\ModelBase;

class Measure extends ModelBase
{
    protected $fillable = ['title', 'orientation', 'high', 'width'];
}
