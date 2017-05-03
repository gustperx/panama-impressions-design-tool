<?php

namespace App\Modules\Config\Methods;

use App\Modules\ModelBase;
use App\Modules\Payments\Payment;

class Method extends ModelBase
{
    protected $fillable = ['title', 'status'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
    public function methodList()
    {
        return $this->where('status', 'publish')->pluck('title', 'id')->toArray();
    }
}
