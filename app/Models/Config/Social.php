<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'color'
    ];
}
