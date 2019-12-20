<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LaravelGoogleGraphController extends Controller
{
    //
    public function index(){
        $data=DB::table('clients')
        ->select(
            DB::raw('member_type as member_type'),
            DB::raw('count(*) as number'))
            ->groupBy('member_type')
            ->get();
    $array[]=['MemberType','Number'];
    foreach($data as $key=>$value){
    }
       $array[++$key]=[$value->member_type,$value->number];
       return view('google_pie_chart')->with('member_type',json_encode($array));
        
    }
    public function comunicationReport(){
        return view('comunicationReport');
    }
    
    public function MailComunicationReport(){
        return view('MailComunicationReport');
    }
}
  