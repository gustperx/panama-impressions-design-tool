<?php

namespace App\Modules\Shop\Orders;

use App\Modules\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
