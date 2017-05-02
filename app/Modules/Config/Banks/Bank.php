<?php

namespace App\Modules\Config\Banks;

use App\Modules\ModelBase;
use App\Modules\Payments\Payment;

class Bank extends ModelBase
{
    protected $fillable = ['name', 'code', 'account'];

    public function payments()
    {
        $this->hasMany(Payment::class);
    }
}
