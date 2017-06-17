<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        'id_owner',
        'id_renter',
        'address',
        'rooms_amount',
        'bath_amount',
        'internet_service',
        'light_service',
        'water_service',
        'rate',
        'latitude',
        'longitude',
        'payment_amount'
    ];
    public function scopeOwner($query,$id){
        return $query->where('id_owner',$id);
    }
}
