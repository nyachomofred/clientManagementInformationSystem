<?php

namespace App\Http\Controllers;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;
use DB;
use dateTime;
class MessageManagementController extends Controller
{
    //
    public function inbox(){
        $data=DB::table('sms')->orderBy('id','DESC')->get();
        return view('messages.inbox')->with(['data'=>$data]);
    }

    public function composespecific(){
        return view('messages.composeSpecificGroup');
    }
    public function composefullmember(){
        return view('messages.composefullmember');
    }

    public function composepracticingmember(){
        return view('messages.composepracticingmember');
    }

    public function composeassociatemember(){
        return view('messages.composeassociatemember');
    }

    public function composeToAll(){
        return view('messages.composeToAll');
    }

    
    public function readMessage($message_id){
        $sms=DB::table('sms')->where(['message_id'=>$message_id])->first();
        $ccsms=DB::table('ccsms')->where(['message_id'=>$message_id])->get();
        return view('messages.readmessage')->with(['sms'=>$sms,'ccsms'=>$ccsms]);
    }


    //send message to specific
    public function sendToSpecific(Request $request){
        $phonenumbers=input::get('phonenumbers');
        $message=input::get('message');
        $subject=input::get('subject');
        $message_id=rand();
        $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string','phonenumbers'=>'required']);
          foreach($phonenumbers as $phonenumber){
            $username = 'clientapp'; // use 'sandbox' for development in the test environment
            $apiKey   = '9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32'; // use your sandbox app API key for development in the test environment
            $AT       = new AfricasTalking($username, $apiKey);
            $sms      = $AT->sms();
            $result   = $sms->send([ 'to' =>$phonenumber,'message' =>$message]);
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
    public function sendToAssociate(Request $request){
        $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string']);
        $message=input::get('message');
        $message_id=rand();
        $subject=input::get('subject');
        $fullmembers=DB::table('clients')->where(['member_type'=>'Associate'])->get();
        $totalmembers=count($fullmembers);
        if($totalmembers >0){
            foreach($fullmembers as $fullmember){
                $phonenumber=$fullmember->phonenumber;
                $username = 'clientapp'; // use 'sandbox' for development in the test environment
                $apiKey   = '9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32'; // use your sandbox app API key for development in the test environment
                $AT       = new AfricasTalking($username, $apiKey);
                $sms      = $AT->sms();
                $result   = $sms->send([ 'to' =>$phonenumber,'message' =>$message]);
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


        }else{
          Alert::warning('Failed','Message sending Failed. No recipient for this message');
          return redirect()->route('messages.inbox');
        }
    }

    public function sendToFullmember(Request $request){
        $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string']);
        $message=input::get('message');
        $message_id=rand();
        $subject=input::get('subject');
        $fullmembers=DB::table('clients')->where(['member_type'=>'Fullmember'])->get();
        $totalmember=count($fullmembers);
        if($totalmember>0){
            foreach($fullmembers as $fullmember){
                $phonenumber=$fullmember->phonenumber;
                $username = 'clientapp'; // use 'sandbox' for development in the test environment
                $apiKey   = '9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32'; // use your sandbox app API key for development in the test environment
                $AT       = new AfricasTalking($username, $apiKey);
                $sms      = $AT->sms();
                $result   = $sms->send([ 'to' =>$phonenumber,'message' =>$message]);
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


        }else{
          Alert::warning('Failed','Message sending Failed');
          return redirect()->route('messages.inbox');
        }
        
      
    }

    public function sendToPracticingMember(Request $request){
        $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string']);
        $message=input::get('message');
        $message_id=rand();
        $subject=input::get('subject');
        $fullmembers=DB::table('clients')->where(['member_type'=>'Practicing'])->get();
        $totalmember=count($fullmembers);
        if($totalmember >0){
            foreach($fullmembers as $fullmember){
                $phonenumber=$fullmember->phonenumber;
                $username = 'clientapp'; // use 'sandbox' for development in the test environment
                $apiKey   = '9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32'; // use your sandbox app API key for development in the test environment
                $AT       = new AfricasTalking($username, $apiKey);
                $sms      = $AT->sms();
                $result   = $sms->send([ 'to' =>$phonenumber,'message' =>$message]);
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


        }else{
          Alert::warning('Failed','Message sending Failed. No recipient for this message');
          return redirect()->route('messages.inbox');
        }
    }

    public function sendToAllMember(Request $request){
        $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string']);
        $message=input::get('message');
        $message_id=rand();
        $subject=input::get('subject');
        $fullmembers=DB::table('clients')->get();
        $totalmembers=count($fullmembers);
        if($totalmembers >0){
            foreach($fullmembers as $fullmember){
                $phonenumber=$fullmember->phonenumber;
                $username = 'clientapp'; // use 'sandbox' for development in the test environment
                $apiKey   = '9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32'; // use your sandbox app API key for development in the test environment
                $AT       = new AfricasTalking($username, $apiKey);
                $sms      = $AT->sms();
                $result   = $sms->send([ 'to' =>$phonenumber,'message' =>$message]);
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


        }else{
          Alert::warning('Failed','Message sending Failed.No recipient for this message');
          return redirect()->route('messages.inbox');
        }
        
    }

    public function draftMessage(){
        $data=DB::table('drafts')->orderBy('id','DESC')->get();
        return view('messages.draftmessage')->with(['data'=>$data]);
    }
    public function saveDraftMessage(Request $request){
       $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string']);
       //saeve data
       $saveData=DB::table('drafts')->insert([
           'subject'=>ucwords($request->subject),
           'message'=>ucfirst($request->message),
           'day'=>Date('d'),
           'month'=>Date('m'),
           'year'=>Date('Y'),
           'dayTime'=>Date('h:i:A')
           ]);
           Alert::success('success','Data has been saved successfully');
           return redirect()->back();
    }

    public function updateDraftMessage(Request $request){
        $validateData=$request->validate(['subject'=>'required|string|max:200','message'=>'required|string']);
        //save data
        $saveData=DB::table('drafts')->update([
            'subject'=>ucwords($request->subject),
            'message'=>ucfirst($request->message),
            ]);
            Alert::success('success','Data has been updated successfully');
            return redirect()->back();
     }

    public function deleteDraftMessage(Request $request){
        $id=$request->id;
       
        $saveData=DB::table('drafts')->where(['id'=>$id])->delete();
            Alert::success('success','Data has been deleted successfully');
            return redirect()->back();
     }
}
