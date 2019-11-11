//send message to specific
    public function sendToSpecific(){
        $phonenumbers=input::get('phonenumbers');
        $message=input::get('message');
        $message_id=rand();
        $number=array();
        if(!empty($phonenumbers)){
            foreach($phonenumbers as $phonenumber){
               $number[]=$phonenumber;
               $username = 'sandbox'; // use 'sandbox' for development in the test environment
               $apiKey   = '6915229b22899fe5a37964ca0004204e501395dc193ee5f8e4b4c4fc737664a3'; // use your sandbox app API key for development in the test environment
               $AT       = new AfricasTalking($username, $apiKey);
               $sms      = $AT->sms();
               $result   = $sms->send([ 'to' =>'+254700228592','message' => $message ]);
               if($result){
                   $insertData=DB::table('ccsms')->insert([
                       'phonenumber'=>$phonenumber,
                       'message_id'=>$message_id,
                       'message'=>$message,
                       'day'=>Date('d'),
                       'month'=>Date('m'),
                       'year'=>Date('Y'),
                       'dayTime'=>Date('h:i:A'),
                   ]);
                  Alert::success('Success','Messages has been send successfully');
                  return redirect()->route('messages.inbox');
               }else{
                  Alert::failed('Failed','Message sending failed');
                  return redirect()->back();
               }
               
            }

            $insertMessage=DB::table('sms')->insert([
                'message_id'=>$message_id,
                'message'=>$message,
                'day'=>Date('d'),
                'month'=>Date('m'),
                'year'=>Date('Y'),
                'dayTime'=>Date('h:i:A'),
            ]);

        }
    }



    public function sendToSpecific(){
               $username = 'greenwebapp'; // use 'sandbox' for development in the test environment
               $apiKey   = '910cd4b0d75ea8b5b8552d820dc3625c42406f8c6774f640a621b9d9ee11d1d6'; // use your sandbox app API key for development in the test environment
               $AT       = new AfricasTalking($username, $apiKey);
               $sms      = $AT->sms();
               $result   = $sms->send([ 'to' =>'+254700228592','message' => 'goodmorning']);
               print_r($result);
    }



    //CLIENT APP API
    9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32




    public function sendToSpecific(){
    $phonenumbers=input::get('phonenumbers');
    $message=input::get('message');
    $message_id=rand();
    $number=array();
    if(!empty($phonenumbers)){
        foreach($phonenumbers as $phonenumber){
           $number[]=$phonenumber;
               $username = 'clientapp'; // use 'sandbox' for development in the test environment
               $apiKey   = '9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32'; // use your sandbox app API key for development in the test environment
               $AT       = new AfricasTalking($username, $apiKey);
               $sms      = $AT->sms();
               $result   = $sms->send([ 'to' =>'+254700228592','message' => $message]);
               print_r($result);
           if($result){
               $insertData=DB::table('ccsms')->insert([
                   'phonenumber'=>$phonenumber,
                   'message_id'=>$message_id,
                   'message'=>$message,
                   'day'=>Date('d'),
                   'month'=>Date('m'),
                   'year'=>Date('Y'),
                   'dayTime'=>Date('h:i:A'),
               ]);
              Alert::success('Success','Messages has been send successfully');
              return redirect()->route('messages.inbox');
           }else{
              Alert::failed('Failed','Message sending failed');
              return redirect()->back();
           }
           
        }

        $insertMessage=DB::table('sms')->insert([
            'message_id'=>$message_id,
            'message'=>$message,
            'day'=>Date('d'),
            'month'=>Date('m'),
            'year'=>Date('Y'),
            'dayTime'=>Date('h:i:A'),
        ]);

    }




               $username = 'clientapp'; // use 'sandbox' for development in the test environment
               $apiKey   = '9e27d9238fc430780f66d0e852f9bed4c2f3a6ecb4b2552c95651c8e31b88e32'; // use your sandbox app API key for development in the test environment
               $AT       = new AfricasTalking($username, $apiKey);
               $sms      = $AT->sms();
               $result   = $sms->send([ 'to' =>'+254700228592','message' =>'good']);
               print_r($result); 



               if($result){
                $insertData=DB::table('ccsms')->insert([
                    'phonenumber'=>$phonenumber,
                    'message_id'=>$message_id,
                    'message'=>$message,
                    'day'=>Date('d'),
                    'month'=>Date('m'),
                    'year'=>Date('Y'),
                    'dayTime'=>Date('h:i:A'),
                ]);

                $insertrecord=DB::table('sms')->insert([
                    'message_id'=>$message_id,
                    'message'=>$message,
                    'day'=>Date('d'),
                    'month'=>Date('m'),
                    'year'=>Date('Y'),
                    'dayTime'=>Date('h:i:A'),
                ]);

                Alert::success('success','Message send successfully');
                return redirect()->route('messages.inbox');
            }else{
              Alert::failed('Failed','Message sending failed');
              return redirect()->back();
            }