<?php

namespace App\Modules\Payments;

use App\Modules\Auth\User;
use App\Modules\Config\Banks\Bank;
use App\Modules\Config\Methods\Method;
use App\Modules\ModelBase;
use App\Modules\Shop\Orders\Order;

class Payment extends ModelBase
{
    protected $fillable = [
        
        'user_id',
        'order_id',
        'bank_id',
        'method_id',
        'status',
        'amount',
        'reference',
        'file_1',
        'motive',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
