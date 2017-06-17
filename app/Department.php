<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        'id_owner',
        'id_renter',
        'direction',
        'rooms_num',
        'bath-num',
        'internet_service',
        'light_service',
        'water_service',
        'rate',
        'latitude',
        'longitude'
    ];
    public function scopeOwner($query,$id){
        return $query->where('id_owner',$id);
    }
}
