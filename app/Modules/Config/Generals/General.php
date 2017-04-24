<?php

namespace App\Modules\Config\Generals;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = ['coin', 'unit_measurement'];
}
