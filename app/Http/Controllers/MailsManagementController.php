<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Mail;
use DateTime;
class MailsManagementController extends Controller
{
    //
    public function index(){
        $data=DB::table('mails')->orderBy('id','DESC')->get();
        return view('mails.index')->with(['data'=>$data]);
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
        $sentmail=DB::table('mails')->where(['message_id'=>$message_id])->first();
        $ccmails=DB::table('ccmails')->where(['message_id'=>$message_id])->get();
        $files=DB::table('files')->where(['message_id'=>$message_id])->get();
        return view('mails.readsentmail')->with(['sentmail'=>$sentmail,'ccmails'=>$ccmails,'files'=>$files]);
    }
    public function insert(Request $request){
        $validateDatat=$request->validate(['email'=>'required', 'subject'=>'min:3','message'=>'min:10',]);
        $data=array('email'=>$request->email,'subject'=>$request->subject,  'messagebody'=>$request->message,'a_file'=>$request->a_file,);
          $sendMail= Mail::send('emails.welcome',$data,function($message) use ($data){
                foreach($data['email'] as $onemail){
                    $message->to($onemail);
                    $message->subject($data['subject']);
                    $message->from('nyachomofred@gmail.com');
                    if(!empty($data['a_file'])){
                    foreach($data['a_file'] as $onefile){
                        $message->attach($onefile->getRealPath(),array(
                            'as'=>$onefile->getClientOriginalName(),
                            'mime'=>$onefile->getMimeType()
                    
                        ));
                    }
                  }
                }
            });
        
            $multipleValues = input::get('email');//getting values of cc mails
            $files=input::file('a_file');//getting values of clicked files.
            $message=input::get('message');
            $message_id=rand();

                if(!empty($multipleValues)){
                    $inserdata=DB::table('mails')->insert([
                        'message_id'=>$message_id,
                        'subject'=>$request->subject,
                        'message'=>$request->message,
                        'day'=>Date('d'),
                        'month'=>Date('m'),
                        'year'=>Date('y'),
                        'dayTime'=>Date('h:i:A'),

                    ]);
                    foreach($multipleValues as $value){
                        $insertData[]=$value;
                        $persons=DB::table('clients')->where(['email'=>$value])->get();
                        foreach($persons as $person){
                            $firstname=$person->firstname;
                            $lastname=$person->lastname;
                            DB::table('ccmails')->insert([
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                                'email' => $value,
                                'message_id'=>$message_id,
                                'subject'=>$request->subject,
                                'message'=>$request->message,
                                'day'=>Date('d'),
                                'month'=>Date('m'),
                                'year'=>Date('y'),
                                'dayTime'=>Date('h:i:A'),
                                ]);
                                if(!empty($files)){
                                    foreach($files as $file){
                                        $name=$file->getClientOriginalName();
                                        $file->move('image',$name,'public');
                                        $images[]=$name;
                                        DB::table('files')->insert([
                                            'firstname' => $firstname,
                                            'lastname' => $lastname,
                                            'email'=>$value,
                                            'message_id'=>$message_id,
                                            'file' => $name,
                                            'subject'=>$request->subject,
                                            'message'=>$request->message,
                                            'day'=>Date('d'),
                                            'month'=>Date('m'),
                                            'year'=>Date('y'),
                                            'dayTime'=>Date('h:i:A'),
                                            ]); 
                                        
                                    }
                                }
                        }
                       
                }
                Alert::success('Success','message has been sent successfully');
                return redirect()->route('mails.index');
            }   
    }


    //compose to all members
    public function composeToAllMember(){
        return view('mails.composeToAllMember');
    }

    public function composeToAllMemberCreate(Request $request){
        $exist=count(DB::table('clients')->get());
        if($exist > 0){
            $validateDatat=$request->validate([ 'subject'=>'min:3','message'=>'min:10',]);
            $message_id=rand();
            $data=array('subject'=>$request->subject,  'messagebody'=>$request->message,'a_file'=>$request->a_file,);
            $sendMail= Mail::send('emails.welcome',$data,function($message) use ($data){
                  $recipients=DB::table('clients')->get();
                  foreach($recipients as $recipient){
                      $onemail=$recipient->email;
                      $message->to($onemail);
                      $message->subject($data['subject']);
                      $message->from('nyachomofred@gmail.com');
                      if(!empty($data['a_file'])){
                      foreach($data['a_file'] as $onefile){
                          $message->attach($onefile->getRealPath(),array(
                              'as'=>$onefile->getClientOriginalName(),
                              'mime'=>$onefile->getMimeType()
                      
                          ));
                      }
                    }
                  }
              });
  
  
  
  
              $inserdata=DB::table('mails')->insert([
                  'message_id'=>$message_id,
                  'subject'=>$request->subject,
                  'message'=>$request->message,
                  'day'=>Date('d'),
                  'month'=>Date('m'),
                  'year'=>Date('y'),
                  'dayTime'=>Date('h:i:A'),
  
              ]);
  
  
  
              $multipleValues = DB::table('clients')->get();//getting values of cc mails
              $files=input::file('a_file');//getting values of clicked files.
                  foreach($multipleValues as $value){
                      $firstname=$value->firstname;
                      $lastname=$value->lastname;
                      $email=$value->email;
                      DB::table('ccmails')->insert([
                          'firstname' => $firstname,
                          'lastname' => $lastname,
                          'email' => $email,
                          'message_id'=>$message_id,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A')]);
                  }
  
  
  
  
  
              if(!empty($files)){
                  foreach($files as $file){
                      $name=$file->getClientOriginalName();
                      $file->move('image',$name,'public');
                      $images[]=$name;
                      DB::table('files')->insert([
                          'message_id'=>$message_id,
                          'file' => $name,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A'),
                          ]); 
                      
                  }
              }
              Alert::success('Success','Email sent successfully');
              return redirect()->route('mails.index');    
        }
        else{
         Alert::warning('Failed','No recipient for this mail');
         return redirect()->route('mails.composeToAllMember');
        }
    }


    public function composeToPracticingMember(){
        return view('mails.composeToPracticingMember');
    }


    public function composeToPracticingMemberCreate(Request $request){
        $exist=count(DB::table('clients')->where(['member_type'=>'Practicing'])->get());
        if($exist > 0){
            $validateDatat=$request->validate([ 'subject'=>'required|min:3','message'=>'required|min:10',]);
            $message_id=rand();
            $data=array('subject'=>$request->subject,  'messagebody'=>$request->message,'a_file'=>$request->a_file,);
            $sendMail= Mail::send('emails.welcome',$data,function($message) use ($data){
                  $recipients=DB::table('clients')->where(['member_type'=>'Practicing'])->get();
                  foreach($recipients as $recipient){
                      $onemail=$recipient->email;
                      $message->to($onemail);
                      $message->subject($data['subject']);
                      $message->from('nyachomofred@gmail.com');
                      if(!empty($data['a_file'])){
                      foreach($data['a_file'] as $onefile){
                          $message->attach($onefile->getRealPath(),array(
                              'as'=>$onefile->getClientOriginalName(),
                              'mime'=>$onefile->getMimeType()
                      
                          ));
                      }
                    }
                  }
              });
  
  
  
  
              $inserdata=DB::table('mails')->insert([
                  'message_id'=>$message_id,
                  'subject'=>$request->subject,
                  'message'=>$request->message,
                  'day'=>Date('d'),
                  'month'=>Date('m'),
                  'year'=>Date('y'),
                  'dayTime'=>Date('h:i:A'),
  
              ]);
  
  
  
              $multipleValues = DB::table('clients')->where(['member_type'=>'Practicing'])->get();//getting values of cc mails
              $files=input::file('a_file');//getting values of clicked files.
                  foreach($multipleValues as $value){
                      $firstname=$value->firstname;
                      $lastname=$value->lastname;
                      $email=$value->email;
                      DB::table('ccmails')->insert([
                          'firstname' => $firstname,
                          'lastname' => $lastname,
                          'email' => $email,
                          'message_id'=>$message_id,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A')]);
                  }
  
  
  
  
  
              if(!empty($files)){
                  foreach($files as $file){
                      $name=$file->getClientOriginalName();
                      $file->move('image',$name,'public');
                      $images[]=$name;
                      DB::table('files')->insert([
                          'message_id'=>$message_id,
                          'file' => $name,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A'),
                          ]); 
                      
                  }
              }
              Alert::success('Success','Email sent successfully');
              return redirect()->route('mails.index');    
        }
        else{
         Alert::warning('Failed','No recipient for this mail');
         return redirect()->route('mails.composeToPracticingMember');
        }
    }



    public function composeToAssociateMember(){
        return view('mails.composeToAssociateMember');
    }


    public function composeToAssociateMemberCreate(Request $request){
        $exist=count(DB::table('clients')->where(['member_type'=>'Associate'])->get());
        if($exist > 0){
            $validateDatat=$request->validate([ 'subject'=>'required|min:3','message'=>'required|min:10',]);
            $message_id=rand();
            $data=array('subject'=>$request->subject,  'messagebody'=>$request->message,'a_file'=>$request->a_file,);
            $sendMail= Mail::send('emails.welcome',$data,function($message) use ($data){
                  $recipients=DB::table('clients')->where(['member_type'=>'Associate'])->get();
                  foreach($recipients as $recipient){
                      $onemail=$recipient->email;
                      $message->to($onemail);
                      $message->subject($data['subject']);
                      $message->from('nyachomofred@gmail.com');
                      if(!empty($data['a_file'])){
                      foreach($data['a_file'] as $onefile){
                          $message->attach($onefile->getRealPath(),array(
                              'as'=>$onefile->getClientOriginalName(),
                              'mime'=>$onefile->getMimeType()
                      
                          ));
                      }
                    }
                  }
              });
  
  
  
  
              $inserdata=DB::table('mails')->insert([
                  'message_id'=>$message_id,
                  'subject'=>$request->subject,
                  'message'=>$request->message,
                  'day'=>Date('d'),
                  'month'=>Date('m'),
                  'year'=>Date('y'),
                  'dayTime'=>Date('h:i:A'),
  
              ]);
  
  
  
              $multipleValues = DB::table('clients')->where(['member_type'=>'Associate'])->get();//getting values of cc mails
              $files=input::file('a_file');//getting values of clicked files.
                  foreach($multipleValues as $value){
                      $firstname=$value->firstname;
                      $lastname=$value->lastname;
                      $email=$value->email;
                      DB::table('ccmails')->insert([
                          'firstname' => $firstname,
                          'lastname' => $lastname,
                          'email' => $email,
                          'message_id'=>$message_id,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A')]);
                  }
  
  
  
  
  
              if(!empty($files)){
                  foreach($files as $file){
                      $name=$file->getClientOriginalName();
                      $file->move('image',$name,'public');
                      $images[]=$name;
                      DB::table('files')->insert([
                          'message_id'=>$message_id,
                          'file' => $name,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A'),
                          ]); 
                      
                  }
              }
              Alert::success('Success','Email sent successfully');
              return redirect()->route('mails.index');    
        }
        else{
         Alert::warning('Failed','No recipient for this mail');
         return redirect()->route('mails.composeToAssociateMember');
        }
    }

    public function composeToFullMember(){
        return view('mails.composeToFullMember');
    }

    public function composeToFullMemberCreate(Request $request){
        $exist=count(DB::table('clients')->where(['member_type'=>'Fullmember'])->get());
        if($exist > 0){
            $validateDatat=$request->validate([ 'subject'=>'required|min:3','message'=>'required|min:10',]);
            $message_id=rand();
            $data=array('subject'=>$request->subject,  'messagebody'=>$request->message,'a_file'=>$request->a_file,);
            $sendMail= Mail::send('emails.welcome',$data,function($message) use ($data){
                  $recipients=DB::table('clients')->where(['member_type'=>'Fullmember'])->get();
                  foreach($recipients as $recipient){
                      $onemail=$recipient->email;
                      $message->to($onemail);
                      $message->subject($data['subject']);
                      $message->from('nyachomofred@gmail.com');
                      if(!empty($data['a_file'])){
                      foreach($data['a_file'] as $onefile){
                          $message->attach($onefile->getRealPath(),array(
                              'as'=>$onefile->getClientOriginalName(),
                              'mime'=>$onefile->getMimeType()
                      
                          ));
                      }
                    }
                  }
              });
  
  
  
  
              $inserdata=DB::table('mails')->insert([
                  'message_id'=>$message_id,
                  'subject'=>$request->subject,
                  'message'=>$request->message,
                  'day'=>Date('d'),
                  'month'=>Date('m'),
                  'year'=>Date('y'),
                  'dayTime'=>Date('h:i:A'),
  
              ]);
  
  
  
              $multipleValues = DB::table('clients')->where(['member_type'=>'Fullmember'])->get();//getting values of cc mails
              $files=input::file('a_file');//getting values of clicked files.
                  foreach($multipleValues as $value){
                      $firstname=$value->firstname;
                      $lastname=$value->lastname;
                      $email=$value->email;
                      DB::table('ccmails')->insert([
                          'firstname' => $firstname,
                          'lastname' => $lastname,
                          'email' => $email,
                          'message_id'=>$message_id,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A')]);
                  }
  
  
  
  
  
              if(!empty($files)){
                  foreach($files as $file){
                      $name=$file->getClientOriginalName();
                      $file->move('image',$name,'public');
                      $images[]=$name;
                      DB::table('files')->insert([
                          'message_id'=>$message_id,
                          'file' => $name,
                          'subject'=>$request->subject,
                          'message'=>$request->message,
                          'day'=>Date('d'),
                          'month'=>Date('m'),
                          'year'=>Date('y'),
                          'dayTime'=>Date('h:i:A'),
                          ]); 
                      
                  }
              }
              Alert::success('Success','Email sent successfully');
              return redirect()->route('mails.index');    
        }
        else{
         Alert::warning('Failed','No recipient for this mail');
         return redirect()->route('mails.composeToFullMember');
        }
    }


}
