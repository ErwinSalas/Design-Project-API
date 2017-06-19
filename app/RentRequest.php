<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentRequest extends Model
{
    protected $fillable=[
        'status',
        'applicant_name',
        'department_name',
        'id_applicant',
        'id_department',
    ];

    public function applicant() //propietario de una solicitud
    {
        return $this->belongsTo('App\User','id_applicant','id');
    }

    public function department() //propiedad que se solicita
    {
        return $this->belongsTo('App\Department','id_department','id');
    }
}
