<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ccsms extends Model
{
    //
    protected $table='ccsms';
    protected $fillable=[
       'firstname',
        'lastname',
        'phonenumber',
        'message_id',
           'subject',
           'message',
           'day',
            'month',
           'year',
           'dayTime',
    ];
}
