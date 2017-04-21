<?php

namespace App\Modules\Config\Banks;

use App\Modules\ModelBase;

class Bank extends ModelBase
{
    protected $fillable = ['name', 'code', 'account'];
}
