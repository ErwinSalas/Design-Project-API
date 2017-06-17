<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    protected $fillable=[
        'name',
        'id_department'
    ];
}
