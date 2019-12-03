<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table='invoices';
    protected $fillable=[
           'invoice_no',
           'client_no',
           'member_id',
            'firstname',
           'lastname',
            'email',
            'phonenumber',
            'invoice_name',
           'day',
           'month',
          'year',
           'dayTime',
         'dueData',
    ];

}
