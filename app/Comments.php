<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable=[
        'state',
        'id_user',
        'message',
        'rate',
        'id_department'
    ];
}
