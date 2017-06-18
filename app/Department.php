<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        'id_owner',
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
        return $this->hasMany('Comments');
    }

    public function owner() //propietario de una propiedad
    {
        return $this->belongsTo('User');
    }

    public function requests(){
        return $this->belongsTo('RentRequest');
    }

    public function scopeOwner($query,$id){
        return $query->where('id_owner',$id);
    }
}