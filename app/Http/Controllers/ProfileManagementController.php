<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Auth;
use DB;
class ProfileManagementController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $id=Auth::user()->id;
        $user=DB::table('users')->where(['id'=>$id])->first();
        return view('profiles.index')->with(['user'=>$user]);
    }
    public function update(Request $request){
        $id=$request->id;
        $updateData=DB::table('users')->where(['id'=>$id])->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            ]);
        Alert::success('success','Profile is updated successfully');
        return redirect()->route('home');
    }
        
}
