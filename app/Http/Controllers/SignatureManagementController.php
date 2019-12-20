<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Mail;
use DateTime;

class SignatureManagementController extends Controller
{
    //
    public function index(){
        $data=DB::table('signatures')->first();
        return view('signatures.index')->with(['data'=>$data]);
    }
    public function insert(Request $request){
        $comapnyLogo=input::file('companyLogo');
        $signatureLogo=input::file('signatureLogo');
        $cfilename=$comapnyLogo->getClientOriginalName();
        $sfilename=$signatureLogo->getClientOriginalName();
        $comapnyLogo->move('image',$cfilename,'public');
        $signatureLogo->move('image', $sfilename,'public');

        $createData=DB::table('signatures')->insert([
            'clouser'=>ucwords($request->clouser),
            'companyName'=>ucwords($request->companyName),
            'companyTelNo'=>ucwords($request->companyTelNo),
            'companyEmail'=>$request->companyEmail,
            'companyWebsiteLink'=>$request->companyWebsiteLink,
            'signatureLogo'=>$sfilename,
            'companyLogo'=>$cfilename,
        ]);
        Alert::success('Success','Data has been added successfully');
        return redirect()->back();
    }
    public function update(Request $request){
      $id=$request->id;
      $updateData=DB::table('signatures')->where(['id'=>$id])->update([
          'companyName'=>ucwords($request->companyName),
          'companyTelNo'=>ucwords($request->companyTelNo),
          'companyEmail'=>$request->companyEmail,
          'companyWebsiteLink'=>$request->companyWebsiteLink,
      ]);
      Alert::success('Success','Data has been added successfully');
      return redirect()->back();

    }


    public function updatelogo(Request $request){
        $id=$request->id;
        $comapnyLogo=input::file('companyLogo');
        $cfilename=$comapnyLogo->getClientOriginalName();
        $comapnyLogo->move('image',$cfilename,'public');
        $updateData=DB::table('signatures')->where(['id'=>$id])->update([
            'companyLogo'=>$cfilename,
        ]);
        Alert::success('Success','Data has been added successfully');
        return redirect()->back();
  
      }
}
