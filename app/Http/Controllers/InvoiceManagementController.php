<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use dateTime;
use RealRashid\SweetAlert\Facades\Alert;
class InvoiceManagementController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function displayClient(){
        $invoices=DB::table('invoices')->orderBy('id','DESC')->get();
        return view('invoices.displayClients')->with(['invoices'=>$invoices]);
    }
    public function searchClient(Request $request){
      $search=$request->search;
      $invoices=DB::table('invoices')->orderBy('id','DESC')->get();
      $data=DB::table('clients')->where(['member_id'=>$search])
                       ->orWhere(['firstname'=>$search])
                       ->orWhere(['lastname'=>$search])
                       ->orWhere(['phonenumber'=>$search])
                       ->orWhere(['email'=>$search])
                       ->orWhere(['location'=>$search])
                       ->orWhere(['place_of_work'=>$search])
                       ->orWhere(['role'=>$search])
                       ->orWhere(['member_type'=>$search])
                       ->get();
    return view('invoices.displayClients')->with(['data'=>$data,'invoices'=>$invoices]);

    }
    public function insertInvoice(Request $request){
        $invoice_no=rand(100,10000);
        $timezone=date_default_timezone_set('Africa/Nairobi');
        $insertData=DB::table('invoices')->insert([
            'invoice_no'=>$invoice_no,
            'client_no'=>$request->client_no,
            'member_id'=>$request->member_id,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phonenumber'=>$request->phonenumber,
            'invoice_name'=>ucfirst($request->invoice_name),
            'day'=>Date('d'),
            'month'=>Date('m'),
            'year'=>Date('Y'),
            'dayTime'=>Date('h:i:A'),
            'dueData'=>$request->dueData,

        ]);

        $invoiceTotal=DB::table('invoicetotals')->insert([
            'invoice_no'=>$invoice_no,
            'total'=>0,

        ]);
        Alert::success('Success','Data has been saved successfully');
        return redirect()->back();
 
    }

    public function updateInvoice(Request $request){
        $id=$request->id;
        $updateData=DB::table('invoices')->where(['id'=>$id])->update([
            'invoice_name'=>ucfirst($request->invoice_name),
            
            'dueData'=>$request->dueData,

        ]);
        Alert::success('Success','Data has been updated successfully');
        return redirect()->back();

    }

    public function deleteInvoice(Request $request){
        $id=$request->id;
        $updateData=DB::table('invoices')->where(['id'=>$id])->delete();
        Alert::success('Success','One record deleted successfully');
        return redirect()->back();

    }
 
    public function addItemInvoicePage($invoice_no){
        $data=DB::table('invoices')->where(['invoice_no'=>$invoice_no])->first();
        $invoiceitems=DB::table('invoiceitems')->where(['invoice_no'=>$invoice_no])->get();
        $totalitems=count(DB::table('invoiceitems')->where(['invoice_no'=>$invoice_no])->get());
        return view('invoices.additeminvoicepage')->with(['data'=>$data,'invoiceitems'=>$invoiceitems,'totalitems'=>$totalitems]);
    }
    public function insertInvoiceItem(Request $request){
        $validateData=$request->validate([
            'itemType'=>'nullable|string|max:250',
            'qty'=>'required|numeric|min:1|max:1000000',
            'unitPrice'=>'required|numeric|min:1|max:1000000',
            'description'=>'required|string',
        ]);
        $amount=$request->qty*$request->unitPrice;
         $insertData=DB::table('invoiceitems')->insert([
             'invoice_no'=>$request->invoice_no,
             'itemType'=>ucwords($request->itemType),
             'qty'=>$request->qty,
             'unitPrice'=>$request->unitPrice,
             'description'=>ucwords($request->description),
             'amount'=>$amount,
         ]);
         $sumItems=DB::table('invoiceitems')->where(['invoice_no'=>$request->invoice_no])->sum('amount');
         $updateInvoicetotal=DB::table('invoicetotals')->where(['invoice_no'=>$request->invoice_no])->update(['total'=>$sumItems]);
         Alert::success('Success','Data inserted successfully');
        return redirect()->back();
    }

    public function updateInvoiceItem(Request $request){
        $id=$request->id;
        $amount=$request->qty*$request->unitPrice;
         $insertData=DB::table('invoiceitems')->where(['id'=>$id])->update([
             'itemType'=>ucwords($request->itemType),
             'qty'=>$request->qty,
             'unitPrice'=>$request->unitPrice,
             'description'=>ucwords($request->description),
             'amount'=>$amount,
         ]);
         $sumItems=DB::table('invoiceitems')->where(['invoice_no'=>$request->invoice_no])->sum('amount');
         $updateInvoicetotal=DB::table('invoicetotals')->where(['invoice_no'=>$request->invoice_no])->update(['total'=>$sumItems]);
         Alert::success('Success','Record updated  successfully');
        return redirect()->back();
    }

    public function deleteInvoiceItem(Request $request){
         $id=$request->id;
         $insertData=DB::table('invoiceitems')->where(['id'=>$id])->delete();
         $sumItems=DB::table('invoiceitems')->where(['invoice_no'=>$request->invoice_no])->sum('amount');
         $updateInvoicetotal=DB::table('invoicetotals')->where(['invoice_no'=>$request->invoice_no])->update(['total'=>$sumItems]);
         Alert::success('Success','One record has been delete successfully');
        return redirect()->back();
    }

    public function invoiceview(Request $request)
    {
        $invoiceNo=$request->invoice_no;
         $items=DB::table('invoices')->where(['invoice_no'=>$invoiceNo])->first();
         $invoiceItems=DB::table('invoiceitems')->where(['invoice_no'=>$invoiceNo])->get();
         $itemcount=count(DB::table('invoiceitems')->where(['invoice_no'=>$invoiceNo])->get());
         $total=DB::table('invoicetotals')->where(['invoice_no'=>$invoiceNo])->first();
         if($itemcount > 0){
             view()->share(['items'=>$items,'invoiceItems'=>$invoiceItems,'total'=>$total]);
             $pdf = PDF::loadView('invoices.invoiceview');
             return $pdf->download('invoice.pdf');
             
         }else{
              Alert::warning('Failed','Could not download empty invoice.Please add item to this invoice');
              return redirect()->back();
         }
         
        
    }

    public function InvoiceManagement($client_no){
        $invoices=DB::table('invoices')->where(['client_no'=>$client_no])->get();
        $client=DB::table('clients')->where(['client_no'=>$client_no])->first();
        return view('invoices.invoicemanagement')->with(['invoices'=>$invoices,'client'=>$client]);

    }
}
