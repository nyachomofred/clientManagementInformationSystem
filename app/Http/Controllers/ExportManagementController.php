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
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class ExportManagementController extends Controller
{
    //
    public function clientpdf(){
             $data=DB::table('clients')->get();
             view()->share(['data'=>$data]);
             $pdf = PDF::loadView('exports.clientpdf')->setPaper('a4','landscape');
             return $pdf->download('clients.pdf');
    }
    public function client(){
         $data=DB::table('clients')->get();
          view()->share(['data'=>$data]);
          $pdf = PDF::loadView('exports.client')->setPaper('a4','landscape');
          return $pdf->download('clients.pdf');
        
    }

    public function clientcsv(){
        $datacount=count(DB::table('clients')->get());
        if($datacount > 0){
            return Excel::download(new ClientExport, 'clients.csv');
        }else{
           Alert::warning('Failed','No record to download');
           return redirect()->back();
        }
        
    }

    public function clientexcel(){
        $datacount=count(DB::table('clients')->get());
        if($datacount > 0){
            return Excel::download(new ClientExport, 'clients.xlsx');
        }else{
           Alert::warning('Failed','No record to download');
           return redirect()->back();
        }


       
    }


    public function userpdf(){
       
        $datacount=count(DB::table('users')->get());
        if($datacount > 0){

            $data=DB::table('users')->get();
            view()->share(['data'=>$data]);
            $pdf = PDF::loadView('exports.userpdf')->setPaper('a4','landscape');
            return $pdf->download('users.pdf');

        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();
        }
        
    }

    public function usercsv(){
        $datacount=count(DB::table('users')->get());
        if($datacount > 0){
            return Excel::download(new UserExport, 'users.csv');

        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();
        }
   
    }

    public function userexcel(){
        $datacount=count(DB::table('users')->get());
        if($datacount > 0){
            return Excel::download(new UserExport, 'users.xlsx');

        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();
        }

   
    }



    public function mailpdf(){
        $datacount=count(DB::table('mails')->get());
        if($datacount > 0){

            $data=DB::table('mails')->get();
            view()->share(['data'=>$data]);
            $pdf = PDF::loadView('exports.mailpdf')->setPaper('a4','landscape');
            return $pdf->download('mail.pdf');

        }else{

            Alert::warning('Failed','No record to download');
            return redirect()->back();

        }
       
    }

    public function mailcsv(){
        $datacount=count(DB::table('mails')->get());
        if($datacount > 0){
            return Excel::download(new MailExport, 'mail.csv');

        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();
        }

   
    }

    public function mailexcel(){
        $datacount=count(DB::table('mails')->get());
        if($datacount > 0){
            return Excel::download(new MailExport, 'mail.xlsx');

        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();
        }

        
    
    }
    
    public function ccmailpdf(Request $request){
      $messag_id=$request->message_id;
      $data=DB::table('ccmails')->where(['message_id'=>$messag_id])->get();
      view()->share(['data'=>$data]);
      $pdf = PDF::loadView('exports.ccmailpdf')->setPaper('a4','landscape');
      return $pdf->download('mails.pdf');

    }


    //export for sms

    public function messagepdf(){
        $datacount=count(DB::table('sms')->get());
        if($datacount > 0){
            $data=DB::table('sms')->get();
            view()->share(['data'=>$data]);
            $pdf = PDF::loadView('exports.messagepdf')->setPaper('a4','landscape');
            return $pdf->download('message.pdf');

        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();
        }
        
    }

    public function messagecsv(){
        $datacount=count(DB::table('sms')->get());
        if($datacount > 0){
            return Excel::download(new SmsExport, 'message.csv');
        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();

        }
   
    }

    public function messageexcel(){
        $datacount=count(DB::table('sms')->get());
        if($datacount > 0){
            return Excel::download(new SmsExport, 'message.xlsx');
        }else{
            Alert::warning('Failed','No record to download');
            return redirect()->back();
            
        }
    }

}
