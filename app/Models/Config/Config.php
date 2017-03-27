<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'logo_header',
        'background',
        'favicon',
        'home',
        'email',
        'phone_one',
        'phone_two'
    ];

    public function getFullNameAttribute()
    {
        return title_case($this->name);
    }
}
