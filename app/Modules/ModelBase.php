<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class ModelBase extends Model
{
    public function getDates()
    {
        return array('created_at', 'updated_at');
    }

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return new Date($date);
    }
}