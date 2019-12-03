<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    //
    protected $table='sms';
    protected $fillable=[
        'message_id',
       'subject',
        'message',
        'day',
        'month',
        'year',
        'dayTime',
    ];
}
