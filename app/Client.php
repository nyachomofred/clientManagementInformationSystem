<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table='clients';
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
        'day',
        'month',
        'year',
        'dayTime',
    ];
}
