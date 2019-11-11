<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sent extends Model
{
    //
    protected $fillable=[
        'member_id',
       'name',
        'subject',
       'message',
       'file',
       'cc',
       'dayTime',
        'day',
        'month',
       'year',
    ];
}
