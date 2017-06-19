<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Department;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()  //los comentarios de un usuario
    {
        return $this->hasMany('Comments','id_user');
    }

    public function departments()  //los departamentos que sube el usuario
    {
        return $this->hasMany('App\Department','id_owner');
    }

    public function rent_requests()  //las solicitudes de un usuario
    {
        return $this->hasMany('RentRequest','id_applicant');
    }
}