<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentRequest extends Model
{
    protected $fillable=[
        'status',
        'id_applicant',
        'id_department',
    ];

    public function applicant() //propietario de una solicitud
    {
        return $this->belongsTo('User','id_applicant','id');
    }

    public function department()
    {
        return $this->belongsTo('Department','id_department','id');
    }
}
