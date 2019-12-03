<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table='files';
    protected $fillable=[
          'subject',
           'file',
            'message_id',
           'message',
           'day',
           'month',
           'year',
           'dayTime',
    ];
}
