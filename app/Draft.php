<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    //
    protected $table='drafts';
    protected $fillable=[
       'subject',
        'message',
        'day',
        'month',
        'year',
        'dayTime',
    ];
}
