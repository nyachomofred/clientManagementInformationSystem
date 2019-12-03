<?php

namespace App\Exports;

use App\Sms;
use Maatwebsite\Excel\Concerns\FromCollection;

class SmsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sms::all();
    }
}
