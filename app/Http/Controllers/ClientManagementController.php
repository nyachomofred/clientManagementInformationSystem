<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
use DB;
use DateTime;
class ClientManagementController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data=DB::table('clients')->paginate(13);
        return view('clients.index')->with(['data'=>$data]);
    }
    
    public function searchclient(Request $request){
        
        $data=DB::table('clients')->where(['member_id'=>$request->search])
                                  ->orWhere(['firstname'=>$request->search])
                                  ->orWhere(['middlename'=>$request->search])
                                  ->orWhere(['lastname'=>$request->search])
                                  ->orWhere(['phonenumber'=>$request->search])
                                  ->orWhere(['email'=>$request->search])
                                  ->orWhere(['location'=>$request->search])
                                  ->orWhere(['place_of_work'=>$request->search])
                                  ->orWhere(['role'=>$request->search])
                                  ->orWhere(['member_type'=>$request->search])
                                  ->paginate(10);
        return view('clients.index')->with(['data'=>$data]);
    }

    
    //add new client to database
    public function add(Request $request){
        $validator=$request->validate([
            'email'=>'nullable|email|unique:clients',
            'phonenumber'=>'regex:/(2547)[0-9]{8}/|string|numeric|digits:12|unique:clients|nullable',  
        ]);
            $client_no=rand();
            $timeset=date_default_timezone_set('Africa/Nairobi');
            $saveData=DB::table('clients')->insert([
                'member_id'=>ucwords($request->member_id),
                'client_no'=>$client_no,
                'firstname'=>ucwords($request->firstname),
                'middlename'=>ucwords($request->middlename),
                'lastname'=>ucwords($request->lastname),
                'phonenumber'=>ucwords($request->phonenumber),
                'email'=>$request->email,
                'location'=>ucwords($request->location),
                'place_of_work'=>ucwords($request->place_of_work),
                'role'=>ucwords($request->role),
                'member_type'=>ucwords($request->member_type),
                'day'=>Date('d'),
                'month'=>Date('m'),
                'year'=>Date('Y'),
                'dayTime'=>Date('h:i"A'),
              ]);
              if($saveData){
                Alert::success('Success ', 'Data has been saved successfully');
                  return redirect()->route('clients.index');
              }else{
                  Alert::error('Filed', 'You have validation error.Check the registration form');
                  return redirect()->route('clients.index');
              }
            
        
    }

    //update data from database
    public function update(Request $request){
        $id=$request->id;
        $updateData=DB::table('clients')->where(['id'=>$id])->update([
          'member_id'=>ucwords($request->member_id),
          'firstname'=>ucwords($request->firstname),
          'middlename'=>ucwords($request->middlename),
          'lastname'=>ucwords($request->lastname),
          'phonenumber'=>ucwords($request->phonenumber),
          'email'=>$request->email,
          'location'=>ucwords($request->location),
          'place_of_work'=>ucwords($request->place_of_work),
          'role'=>ucwords($request->role),
          'member_type'=>ucwords($request->member_type),
        ]);
           Alert::success('Success ', 'Data has been updated successfully');
            return redirect()->route('clients.index');
    }
    //delete member/client from database
    public function delete(Request $request){
        $id=$request->id;
        $deleteData=DB::table('clients')->where(['id'=>$id])->delete();
        Alert::warning('Warning ', 'One record has been deleted successfully');
        return redirect()->route('clients.index');
    }
}
