<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Pnlinh\InfobipSms\Facades\InfobipSms;
use AfricasTalking\SDK\AfricasTalking;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;
use DB;
use dateTime;

class InfobipManagementController extends Controller
{
    //
    public function send(){
        $response = InfobipSms::send('254700228592', 'Hello Infobip');
        return $response;
    }

    public function composeToSpecificGroup(){
        return view('infobips.composetospecificgroup');
    }


     //send message to specific
     public function sendToSpecific(Request $request){
        $phonenumbers=input::get('phonenumbers');
        $message=input::get('message');
        $subject=input::get('subject');
        $message_id=rand();
        $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string','phonenumbers'=>'required']);
          foreach($phonenumbers as $phonenumber){
            $response = InfobipSms::send($phonenumber, $message);
            $data=DB::table('clients')->where(['phonenumber'=>$phonenumber])->get();
            foreach($data as $client){
                $firstname=$client->firstname;
                $lastname=$client->lastname;
                $insertData=DB::table('ccsms')->insert([
                    'firstname'=>$firstname,
                    'lastname'=>$lastname,
                    'phonenumber'=>$phonenumber,
                    'message_id'=>$message_id,
                    'message'=>$message,
                    'subject'=>$subject,
                    'day'=>Date('d'),
                    'month'=>Date('m'),
                    'year'=>Date('Y'),
                    'dayTime'=>Date('h:i:A'),
                ]);

            }

            
          } 

          $insertrecord=DB::table('sms')->insert([
            'message_id'=>$message_id,
            'message'=>$message,
            'subject'=>$subject,
            'day'=>Date('d'),
            'month'=>Date('m'),
            'year'=>Date('Y'),
            'dayTime'=>Date('h:i:A'),
        ]);
         Alert::success('Success','Message send successfully');
         return redirect()->route('messages.inbox');
        }

    //SEND TO ASSOCIATE
}
