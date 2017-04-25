<?php

namespace App\Modules\Config\Socials;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [

        'social_id',
        'url',
    ];
    
    public function social()
    {
        return $this->belongsTo(Social::class);
    }
}
