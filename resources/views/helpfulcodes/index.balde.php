\\code that insert multiple images to database


public function insert(Request $request){
        
          if($files=$request->file('images')){
            foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('image',$name);
            $images[]=$name;
            /*Insert your data*/
            DB::table('sents')->insert(['file' => $name,'message'=>'yeas', ]);
            }
            }
            return redirect()->back()->with('message', 'Successfully Save Your Image file.');
            }






            public function insert(Request $request){
  
            $insertData = array();
            $multipleValues = $request->get('MultipleValues');
            foreach($multipleValues as $value)
            {
                $insertData[] = $value;
                DB::table('sents')->insert(['cc' => $value,'message'=>'yeas', ]);
            }

            }






            $insertData=DB::table('sents')->insert([
                                'name'=>$to,
                                'subject'=>$subject,
                                'message'=>$message,
                                'file'=>$attachment,
                                'cc'=>$cc,
                                'dayTime'=>Date('h:i:A'),
                                'day'=>Date('d'),
                                'month'=>Date('m'),
                                'year'=>Date('Y'),
                               
                             ]);










$beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
$beautymail->send('emails.welcome', [], function($message ){
    $timezone=date_default_timezone_set('Africa/Nairobi');
    $cc=json_encode(input::get('MultipleValues'));
    
    $subject=input::get('subject');
    $message=input::get('message');
    $multipleValues = input::get('MultipleValues');//getting values of cc mails
    $files=input::file('images');//getting values of clicked files.
    $insertData = array();
    $images=array();

    if(!empty($multipleValues)){
        if(!empty($files)){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
                foreach($multipleValues as $value){
                    $insertData[]=$value;
                    DB::table('ccmails')->insert(['email' => $value,'message'=>$message,]);
                    DB::table('files')->insert(['file' => $name,'email'=>$value,]);
                    
                }

             }
                 $to=input::get('name');
                  $message->from('bar@example.com')
                     ->to('fred@zalego.com' ,'John Smith')
                     ->cc($value)
                     ->subject($subject);
        }
        
    } 
});   










public function insert(Request $request){

$beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
$beautymail->send('emails.welcome', [], function($message)
{
    $to_email=Input::get('name');
    $multipleValues=input::get('MultipleValues');
    foreach($multipleValues as $value){
        $insertData=array();
        $insertData[]=$value;
        $message
        ->from('okello@gmail.com')
        ->to($to_email, 'John Smith')
        ->cc($value)
        ->subject('Welcome!');
    }
    
   }); 
}






public function insert(Request $request){

$beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
$beautymail->send('emails.welcome', [], function($message)
{
    $to_email=Input::get('name');
    $multipleValues=input::get('MultipleValues');
    if(!empty($multipleValues)){
        foreach($multipleValues as $value){
            $insertData=array();
            $insertData[]=$value;
            $message
            ->from('okello@gmail.com')
            ->to($to_email, 'John Smith')
            ->cc($value)
            ->subject('Welcome!');
         }
     }  
   }); 
}







if(!empty($multipleValues)){
            if(!empty($files)){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $images[]=$name;
                   
                    foreach($multipleValues as $value){
                        $insertData[]=$value;
                        DB::table('ccmails')->insert(['email' => $value,'message'=>$message,]);
                        DB::table('files')->insert(['file' => $name,'email'=>$value,]);  
                    }
    
                 }
            }
            
        } 



        if(!empty($files)){
            if(!empty($multipleValues)){
                foreach($multipleValues as $value){
                    $insertData[]=$value;
                    DB::table('ccmails')->insert(['email' => $value,'message'=>$message,]);
                    foreach($files as $file){
                        $name=$file->getClientOriginalName();
                        $images[]=$name;
                        DB::table('files')->insert(['file' => $name,'email'=>$value,]);  
                    }

                }

            }

        }




Code that send mail



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
                            ->subject($subject)
                            ->attach($file->getRealPath()); 
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
   
