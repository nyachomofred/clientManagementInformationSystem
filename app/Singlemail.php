<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singlemail extends Model
{
    //
    protected $table='singlemails';
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
