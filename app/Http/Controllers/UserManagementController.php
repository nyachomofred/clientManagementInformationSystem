<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use DB;
class UserManagementController extends Controller
{
    
    public function index(){
        $data=DB::table('users')->get();
        return view('users.index')->with(['data'=>$data]);
    }

    public function adduser(Request $request){
        $validateDate=$request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $insertData=DB::table('users')->insert([
            'firstname'=>$request->lastname,
            'lastname'=>$request->firstname,
            'email'=>$request->email,
            'password'=>Has::make($request->password),
            'role'=>$request->role,
            'passwordPlainText'=>$request->password, 
        ]);
        return redirect()->back();
    }

    public function updateuser(Request $request){
        $id=$request->id;
        
        $insertData=DB::table('users')->where(['id'=>$id])->update([
            'firstname'=>$request->lastname,
            'lastname'=>$request->firstname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'passwordPlainText'=>$request->password, 
        ]);
        Alert::success('Success','Data has been updated successfully');
        return redirect()->back();
    }
//DELETE USER
    public function deleteuser(Request $request){
        $id=$request->id;
        $insertData=DB::table('users')->where(['id'=>$id])->delete();
        return redirect()->back();
    }
}
