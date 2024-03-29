<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Pnlinh\InfobipSms\Facades\InfobipSms;
use AfricasTalking\SDK\AfricasTalking;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;
use DB;
use dateTime;

class MessageManagementController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

    //public function se
    public function sendToOnePerson(Request $request){

            $phonenumber=$request->phonenumber;
            $message=$request->message;
            $result = InfobipSms::send($phonenumber, $message);
            if($result==TRUE){
                $saveData=DB::table('singlemessages')->insert([
                    'member_id'=>ucwords($request->member_id),
                    'client_no'=>$request->client_no,
                    'firstname'=>ucwords($request->firstname),
                    'middlename'=>ucwords($request->middlename),
                    'lastname'=>ucwords($request->lastname),
                    'phonenumber'=>ucwords($request->phonenumber),
                    'email'=>$request->email,
                    'location'=>ucwords($request->location),
                    'place_of_work'=>ucwords($request->place_of_work),
                    'role'=>ucwords($request->role),
                    'member_type'=>ucwords($request->member_type),
                    'subject'=>ucwords($request->subject),
                    'message'=>ucwords($request->message),
                    'day'=>Date('d'),
                    'month'=>Date('m'),
                    'year'=>Date('Y'),
                    'dayTime'=>Date('h:i"A'),
                  ]);
                Alert::success('Success', 'Message Send Successfully');
                return redirect()->back();
             
            }else{
                Alert::error('Failed', 'Could not send message. Please contact your email service provider');
                return redirect()->back();

            }
        
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
            $result = InfobipSms::send($phonenumber, $message);//send message
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
                $result = InfobipSms::send($phonenumber, $message);//send message
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
                $result = InfobipSms::send($phonenumber, $message);//send message
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
                $result = InfobipSms::send($phonenumber, $message);//send message
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
                $result = InfobipSms::send($phonenumber, $message);//send message
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

     public function sendOne($client_no){
        $client=DB::table('clients')->where(['client_no'=>$client_no])->first();
        $phonenumber=$client->phonenumber;
        if($phonenumber !==NULL){
            $messages=DB::table('singlemessages')->where(['client_no'=>$client_no])->get();
            return view('messages.sendone')->with(['client'=>$client,'messages'=>$messages]);

        }else{
            Alert::warning('Faild','This member does not have email Address');
            return redirect()->back();
        }
        
    }
}
