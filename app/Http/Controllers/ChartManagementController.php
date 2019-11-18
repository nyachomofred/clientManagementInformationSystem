<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MemberTypeChart;
use DB;
class ChartManagementController extends Controller
{
    //



    public function index(){
        $practicing=count(DB::table('clients')->where(['member_type'=>'Practicing'])->get());
        $associate=count(DB::table('clients')->where(['member_type'=>'Associate'])->get());
        $full=count(DB::table('clients')->where(['member_type'=>'Fullmember'])->get());

        //initiate chasrt
        $chart=new MemberTypeChart;
        $chart->labels(['Practicing','Associate','Fullmember']);
        $chart->dataset('My dataset','line',[$practicing,$associate,$full]);

        return view('charts.index',['chart'=>$chart]);

         
    }
}
