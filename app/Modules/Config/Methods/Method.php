<?php

namespace App\Modules\Config\Methods;

use App\Modules\ModelBase;
use App\Modules\Payments\Payment;

class Method extends ModelBase
{
    protected $fillable = ['title', 'status'];

    public function payments()
    {
        $this->hasMany(Payment::class);
    }
}
