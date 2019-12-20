<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use PDF;
use DB;
use App\Exports\ClientExport;
use App\Exports\UserExport;
use App\Exports\SmsExport;
use App\Exports\MailExport;
use Maatwebsite\Excel\Facades\Excel;
class ReportManagementController extends Controller
{
    //
    public function index(){
        return view('reports.index');
    }
    
    public function client(){
        $data=DB::table('clients')->get();
        return view('reports.client')->with(['data'=>$data]);
    }

    public function clientreport(Request $request){
             $data=DB::table('clients')->where(['member_type'=>$request->member_type,'year'=>$request->year])->get();
             view()->share(['data'=>$data]);
             $pdf = PDF::loadView('reports.clientpdf')->setPaper('a4','landscape');
             return $pdf->download('clients.pdf');
             return view('reports.client')->with(['data'=>$data]);


             //return Excel::download(new ClientExport, 'clients.csv');
    }
}
