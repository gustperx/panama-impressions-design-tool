<?php

namespace App\Modules\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'type',
        'status',
        'first_name',
        'last_name',
        'dni',
        'phone_one',
        'phone_two',
        'alternate_email',
        'avatar',
        'registration_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setPasswordAttribute($value)
    {
        if(isset($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function getFullNameAttribute()
    {
        return title_case($this->first_name) . ' ' . title_case($this->last_name);
    }
}
