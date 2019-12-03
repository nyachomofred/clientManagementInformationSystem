<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singlemessage extends Model
{
    //
    protected $table='singlemessages';
    protected $fillable=[
       'client_no',
           'member_id',
            'firstname',
            'middlename',
           'lastname',
           'phonenumber',
            'email',
           'location',
           'place_of_work',
           'role',
            'member_type',
            'subject',
           'message',
            'day',
            'month',
           'year',
           'dayTime',
    ];
}
