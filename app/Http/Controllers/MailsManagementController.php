<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use DateTime;
class MailsManagementController extends Controller
{
    //
    public function index(){
        return view('mails.index');
    }

    public function compose(){
        return view('mails.compose');
    }

    public function sent(){
        $sentmails=DB::table('sents')->orderBy('id','DESC')->get();
        return view('mails.sent')->with(['sentmails'=>$sentmails]);
    }
    //read sent mails
    public function readsentmail($message_id){
        $sentmail=DB::table('sents')->where(['message_id'=>$message_id])->first();
        $ccmails=DB::table('ccmails')->where(['message_id'=>$message_id])->get();
        $files=DB::table('files')->where(['message_id'=>$message_id])->get();
        return view('mails.readsentmail')->with(['sentmail'=>$sentmail,'ccmails'=>$ccmails,'files'=>$files]);
    }
    public function insert(Request $request){
    $timezone=date_default_timezone_set('Africa/Nairobi');
    $cc=json_encode(input::get('MultipleValues'));
    $subject=input::get('subject');
    $message=input::get('message');
    $to=input::get('name');
    $attachment=json_encode(input::get('images'));
    $message_id=rand();
    $multipleValues = input::get('MultipleValues');//getting values of cc mails
    $files=input::file('images');//getting values of clicked files.
   
    $client=DB::table('clients')->where(['email'=>$to])->first();
    $firstname=$client->firstname;
    $lastname=$client->lastname;
    
    $insertrecord=DB::table('sents')->insert([
        'name'=>$to,
        'subject'=>ucwords($subject),
        'message_id'=>$message_id,
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'message'=>ucwords($message),
        'file'=>$attachment,
        'cc'=>$cc,
        'dayTime'=>Date('h:i:A'),
        'day'=>Date('d'),
        'month'=>Date('m'),
        'year'=>Date('Y'),
       
     ]);
    

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.welcome', [], function($message)
        {
            $to_email=Input::get('name');
            $multipleValues=Input::get('MultipleValues');
            $files=Input::file('images');
            $subject=input::get('subject');
            if(!empty($multipleValues)){
                if(!empty($files)){
                    foreach($files as $file){
                        $images=array();
                        $name=$file->getClientOriginalName();
                        $file->move('image',$name,'public');
                        //$path=Storage::putFileAs('attachments',$name,'public');
                        $images[]=$name;

                        foreach($multipleValues as $value){
                            $insertData=array();
                            $insertData[]=$value;
                            $message
                            ->from('okello@gmail.com')
                            ->to($to_email, 'John Smith')
                            ->cc($value)
                            ->subject($subject);
                           
                        }

                    }
                }
             }  
        }); 

        if(!empty($multipleValues)){
            foreach($multipleValues as $value){
                $insertData[]=$value;
                DB::table('ccmails')->insert(['email' => $value,'message'=>$message,'message_id'=>$message_id]);

            if(!empty($files)){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $images[]=$name;
                    DB::table('files')->insert(['file' => $name,'email'=>$value,'message_id'=>$message_id]);  
                }
            }
          }
        }
   

    }
}
