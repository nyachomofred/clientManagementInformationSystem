<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentManagementController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function sendmail(Request $request){
        
    }
}
