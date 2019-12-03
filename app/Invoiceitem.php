<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoiceitem extends Model
{
    //
    protected $table='invoiceitems';
    protected $fillable=[
      'invoice_no',
       'itemType',
       'qty',
       'unitPrice',
       'description',
       'amount',
    ];
}
