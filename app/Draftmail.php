<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draftmail extends Model
{
    //
    protected $table='draftmails';
    protected $fillable=[
       'subject',
        'message',
        'day',
       'month',
       'year',
        'dayTime',
    ];
}
