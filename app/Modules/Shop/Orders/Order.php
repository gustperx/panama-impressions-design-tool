<?php

namespace App\Modules\Shop\Orders;

use App\Modules\Auth\User;
use App\Modules\ModelBase;

class Order extends ModelBase
{
    protected $fillable = ['status', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
