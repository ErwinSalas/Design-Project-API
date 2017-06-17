<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentRequest extends Model
{
    protected $fillable=[
        'state',
        'id_user',
        'message',
        'id_department',

    ];
    public function scopeOwner($query,$id_owner){
        $department=Department::find($this->id_department);
        if($department->id_owner==$id_owner){
            return $query;

        }
        else{
            return null;
        }
    }
}
