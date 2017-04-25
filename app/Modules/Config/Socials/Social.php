<?php

namespace App\Modules\Config\Socials;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'color'
    ];
}
