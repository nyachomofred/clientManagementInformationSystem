<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoicetotal extends Model
{
    //
    protected $table='invoicetotals';
    protected $fillable=[
       'invoice_no',
       'total',
    ];
}
