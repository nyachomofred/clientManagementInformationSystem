<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
use DB;
class ClientManagementController extends Controller
{
    //
    public function index(){
        $data=DB::table('clients')->get();
        return view('clients.index')->with(['data'=>$data]);
    }
    //add new client to database
    public function add(Request $request){
        $validator=$request->validate([
            'email'=>'nullable|email|unique:clients',
            'phonenumber'=>'regex:/(07)[0-9]{8}/|string|numeric|digits:10|unique:clients|nullable',
            
            
        ]);

            $saveData=DB::table('clients')->insert([
                'member_id'=>ucwords($request->member_id),
                'firstname'=>ucwords($request->firstname),
                'lastname'=>ucwords($request->lastname),
                'phonenumber'=>ucwords($request->phonenumber),
                'email'=>$request->email,
                'location'=>ucwords($request->location),
                'place_of_work'=>ucwords($request->place_of_work),
                'role'=>ucwords($request->role),
                'member_type'=>ucwords($request->member_type),
              ]);
              if($saveData){
                Alert::success('Success ', 'Data has been saved successfully');
                  return redirect()->back();
              }else{
                  Alert::error('Filed', 'You have validation error.Check the registration form');
                  return redirect()->back();
              }
            
        
    }

    //update data from database
    public function update(Request $request){
        $id=$request->id;
        $updateData=DB::table('clients')->where(['id'=>$id])->update([
          'member_id'=>ucwords($request->member_id),
          'firstname'=>ucwords($request->firstname),
          'lastname'=>ucwords($request->lastname),
          'phonenumber'=>ucwords($request->phonenumber),
          'email'=>$request->email,
          'location'=>ucwords($request->location),
          'place_of_work'=>ucwords($request->place_of_work),
          'role'=>ucwords($request->role),
          'member_type'=>ucwords($request->member_type),
        ]);
           Alert::success('Success ', 'Data has been updated successfully');
            return redirect()->back();
    }
    //delete member/client from database
    public function delete(Request $request){
        $id=$request->id;
        $deleteData=DB::table('clients')->where(['id'=>$id])->delete();
        Alert::warning('Warning ', 'One record has been deleted successfully');
        return redirect()->back();
    }
}
