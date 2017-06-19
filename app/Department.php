<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        'id_owner',
        'name',
        'description',
        'address',
        'rooms_amount',
        'bath_amount',
        'internet_service',
        'light_service',
        'water_service',
        'is_rented',
        'rate',
        'latitude',
        'longitude',
        'payment_amount'
    ];

    public function comments() //comentarios de una propiedad
    {
        return $this->hasMany('App\Comments','id_department');
    }

    public function owner() //propietario de una propiedad
    {
        return $this->belongsTo('User','id_owner','id');
    }

    public function requests(){
        return $this->hasMany('RentRequest','id_department');
    }

    public function scopeOwner($query,$id){
        return $query->where('id_owner',$id);
    }
}
