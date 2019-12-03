<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ccmail extends Model
{
    //
    protected $table='ccmails';
    protected $fillable=[
           'firstname',
           'lastname',
           'email',
           'message_id',
           'subject',
          'message',
            'day',
           'month',
            'year',
           'dayTime',
    ];
}
