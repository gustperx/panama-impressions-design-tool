<?php

namespace App\Modules\Config\Banks;

use App\Modules\ModelBase;
use App\Modules\Payments\Payment;

class Bank extends ModelBase
{
    protected $fillable = ['name', 'code', 'account'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
    public function bankList()
    {
        return $this->pluck('name', 'id')->toArray();
    }
}
