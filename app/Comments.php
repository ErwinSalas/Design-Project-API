<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable=[
        'id_user',
        'message',
        'score',
        'id_department'
    ];

    public function department() //departamento al que se realiza un comentario
    {
        return $this->belongsTo('Department','id_department','id');
    }

    public function user() //usuario que hizo el comentario
    {
        return $this->belongsTo('User','id_user','id');
    }
}
