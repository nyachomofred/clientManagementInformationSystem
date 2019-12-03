<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    //
    protected $table='mails';
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
