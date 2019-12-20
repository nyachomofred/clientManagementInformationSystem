@extends('layouts.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Main content -->

<style>
   
    
    table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #1d96b2;
     
}
   }

</style>

<section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            @if(!empty($data))
              <h3 class="box-title">
                  <br>
                   &nbsp;&nbsp;
                   
                   Invoice No: &nbsp;{{$data->invoice_no}} &nbsp;&nbsp;
                   Invoice Name: &nbsp; {{$data->invoice_name}} &nbsp;&nbsp;
                   Available Item:  &nbsp;{{$totalitems}}
                   Total:  &nbsp;<strong style="color:red">Ksh: {{$total->total}}</strong>
            @endif
            </h3>
              @if(!empty($data))
                <a href="{{url('/invoices/InvoiceManagement/'.$data->client_no)}}" class="btn btn-info"  style="float:left;"><i class="fa fa-backward"> Go Back </i></a>                                       
              @endif
             
                <div class="btn-group" role="group" aria-label="..." style="float:right;">
                     
                  
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItem"  ><i class="fa fa-user-plus"> Add New Item </i></button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#viewinvoice"  ><i class="fa fa-user-plus"> Preview Invoice</i></button>
                   
                   <form method="GET" action="{{ route('invoiceview',['download'=>'pdf']) }}" style="float:right;">
                      <input type="text" name="invoice_no" class="form-control" value="{{$data->invoice_no}}" style="display:none;">
                      <button type="submit" name="submit" class="btn btn-success" value="Download"><i class="fa fa-download">Download Invoice</i></button>
                   </form> 
                  
                 
                   
                
                </div>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                <thead>
                     <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                        <th>#</th>
                        <th>Item Type</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Unit Price (Ksh)</th>
                        <th>Amount (ksh)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($invoiceitems))
                        @foreach($invoiceitems as $key=>$invoiceitem)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$invoiceitem->itemType}}</td>
                            <td>{{$invoiceitem->description}}</td>
                            <td>{{$invoiceitem->qty}}</td>
                            <td>{{$invoiceitem->unitPrice}}</td>
                            <td>{{$invoiceitem->amount}}</td>

                            <td>
                                <div class="margin">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#" data-toggle="modal" data-target="#update{{$invoiceitem->id}}"><i class="fa fa-eye">Update</i></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete{{$invoiceitem->id}}"><i class="fa fa-trash">Delete</i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </td>

                        </tr>

                        <div class="modal fade" id="delete{{$invoiceitem->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Are You sure you want to delete this record ?</h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('invoices.deleteInvoiceItem')}}">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group" style="display:none">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                            <div class="col-sm-10"> 
                                              <input type="text" name="id" class="form-control" required value="{{$invoiceitem->id}}">
                                            </div>
                                            
                                        </div>

                                        <div class="form-group" style="display:none">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                            <div class="col-sm-10"> 
                                              <input type="text" name="invoice_no" class="form-control" required value="{{$invoiceitem->invoice_no}}">
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>


                        <div class="modal fade" id="update{{$invoiceitem->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                       
                                        <center><h4 class="modal-title">Update  Item on Invoice</h4></center>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('invoices.updateInvoiceItem')}}">
                                    @csrf
                                     <div class="modal-body" style="color:#9e9e9e !important;">

                                        <div class="form-group" style="display:none">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                            <div class="col-sm-10"> 
                                            <input type="text" name="id" class="form-control" required value="{{$invoiceitem->id}}">
                                            </div>
                                            
                                        </div>

                                        <div class="form-group" style="display:none">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Invoice No</label>
                                            <div class="col-sm-10"> 
                                            <input type="text" name="invoice_no" class="form-control" required value="{{$invoiceitem->invoice_no}}">
                                            </div>
                                            
                                        </div>
                                       

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Item Type/Name</label>
                                            <div class="col-sm-10"> 
                                            <input type="text" name="itemType" class="form-control" required value="{{$invoiceitem->itemType}}">
                                            </div>
                                            
                                        </div>

                                         <br><br>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                            <div class="col-sm-10"> 
                                               <textarea name="description" class="form-control" required>{{$invoiceitem->description}}</textarea>
                                            </div>
                                            
                                        </div>

                                        <br><br>
                                        <br>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Qty</label>
                                            <div class="col-sm-10"> 
                                            <input type="number" min="1" max="1000000"  name="qty" class="form-control" required value="{{$invoiceitem->qty}}">
                                            </div>
                                            
                                        </div>

                                        <br><br>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Unit Price</label>
                                            <div class="col-sm-10"> 
                                            <input type="number" min="1" max="1000000"  name="unitPrice" class="form-control" required value="{{$invoiceitem->unitPrice}}" step="0.01">
                                            </div>
                                            
                                        </div>
                                        <br><br>
                                        <br><br>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                                        <button type="submit" class="btn btn-primary" style="background-color: #4285f4 !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Update</button>
                                    </div>
                                </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        @endforeach
                    @endif
                </tbody>
                
              </table>
                

              <div class="modal fade" id="addItem">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"> Add Item To Invoice</h4>
                                
                            </div>
                        <form class="form-horizontal" method="POST" action="{{route('invoices.insertInvoiceItem')}}">
                            @csrf
                           <div class="modal-body" style="color:#9e9e9e !important;">


                            <div class="form-group" style="display:none;">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Invoice No</label>
                                    <div class="col-sm-10"> 

                                    @if(!empty($data))
                                        <input type="text" name="invoice_no" class="form-control" value="{{$data->invoice_no}}">
                                    @endif

                                    </div>
                                    
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Item Type/Name</label>
                                    <div class="col-sm-10"> 
                                        <input type="text" name="itemType" class="form-control" required>
                                    </div>
                                    
                                </div>

                                <br> 

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10"> 
                                        <textarea name="description" class="form-control"></textarea>  
                                    </div>
                                    
                                </div>

                                <br>  

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Quantity (Qty)</label>
                                    <div class="col-sm-10"> 
                                        <input type="number" name="qty" class="form-control" min='1' max="1000000" required>
                                    </div>
                                    
                                </div>

                                <br> 

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Unit Price</label>
                                    <div class="col-sm-10"> 
                                        <input type="number" name="unitPrice" class="form-control" min='1' max="10000000000"  step="0.01" required>
                                    </div>
                                    
                                </div>

                                <br> 


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                                <button type="submit" class="btn btn-primary" style="background-color: #4285f4 !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Add</button>
                            </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                            <!-- /.modal-dialog -->
             </div>
             
             
             
             
             
             
             
             
             
             
             
             
            
             
              <div class="modal fade" id="viewinvoice">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                       
                           <div class="modal-body">
                                @if(!empty($items))
                                 <div class="container" style="border:0px solid #ffa31ab;">
                                     <div class="invoiceHeader" style="width:49%;height: 100px;background-color:#9fdf9f;">
                                         <table style="border:0px solid black;">
                                             <tr style="border:0px solid black" style="width:100%;">
                                                 <td style="color:white;font-size:50px; border:0px solid black;width:45%;">INVOICE</td>
                                                 <td style="border:0px solid black;width:20%;"></td>
                                                 <td align="right" style="border:0px solid black; width:35%;">
                                                      Global Learning Services <br>
                                                      
                                                        P.O Box 856 00606.Nairobi<br>
                                                        Tel: +254 722 791 703 <br>
                                                        info@globallearning.co.ke
                                                   </td>
                                                 
                                             </tr>
                                         </table>
                                         
                                     </div>
                                    <br><br>
                                   <table style="border:0px solid black;width:49%;" >
    
                                          <tbody>
                                             <tr style="border:0px solid black">
                                               <td style="border:0px solid black"><h3>Bill To</h3></td>
                                               <td  align="right;" style="border:0px solid black"> <h4>Invoice No: <b style="color:blue;font-size:20px;"> {{$total->invoice_no}}</h4></td>
                                               <td  align="right;" style="border:0px solid black" align="right"> <h4>Invoice Total</h4></td>
                                             </tr>
                                               <tr style="border:0px solid black">
                                                  <td style="border:0px solid black">
                                                    Name: {{$items->firstname}} {{$items->lastname}} <br>
                                                    Email:{{$items->email}}<br>
                                                    Tel:{{$items->phonenumber}}
                                    
                                                  </td>
                                                  <td style="border:0px solid black">
                                                     <b>Date of Issue</b><br>
                                                       12/12/2009
                                                  </td>
                                                  <td style="border:0px solid black" align="right">
                                                    <b style="color:red;font-size:15px;"> Ksh {{$total->total}}</b><br>
                                                  </td>
                                               </tr>
                                          <tbody>
                                    </table>
                                    <br><br>
                                    
                                    <table style="width:49%; border:1px solid black">
                                         <thead>
                                            <tr>
                                               <th>#</th>
                                               <th>Item Type</th>
                                               <th>Description</th>
                                               <th>Qty</th>
                                               <th>Unit Price (Ksh)</th>
                                               <th>Amount (Ksh)</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                            @if(!empty($invoiceItems))
                                                @foreach($invoiceItems as $key=>$invoiceItem)
                                                   <tr>
                                                      <td>{{++$key}}</td>
                                                      <td>{{$invoiceItem->itemType}}</td>
                                                      <td>{{$invoiceItem->description}}</td>
                                                      <td>{{$invoiceItem->qty}}</td>
                                                      <td>{{$invoiceItem->unitPrice}}.00</td>
                                                      <td>{{$invoiceItem->amount}}.00</td>
                                                   </tr>
                                                @endforeach
                                    
                                                <tr>
                                                      <td colspan="4"></td>
                                                      <td colspan="2">
                                                         <table style="border:0px solid black;width:100%;">
                                                            <tbody>
                                                               <tr style="border:0px solid black">
                                                                  <td style="border:0px solid black">Sub Total (Ksh)</td>
                                                                  @if(!empty('$sum'))
                                                                  <td style="border:0px solid black">{{$sum}}</td>
                                                                  @endif
                                                               </tr>
                                                               <tr style="border:0px solid black">
                                                                  <td style="border:0px solid black">VAT</td>
                                                                  @if(!empty($items))
                                                                  <td style="border:0px solid black">{{$items->vat}}</td>
                                                                  @endif
                                                               </tr>
                                    
                                                               <tr style="border:0px solid black">
                                                                  <td style="border:0px solid black"><b>TOTAL</b></td>
                                                                  <td style="border:0px solid black;color:red;">{{$total->total}}</td>
                                                               </tr>
                                    
                                                            </tbody>
                                                         </table>
                                                      </td>
                                                      
                                                </tr>
                                             @else
                                             <p>No record found</p>
                                             @endif
                                         </tbody>
                                        
                                      </table>



                                 </div>
                                     
                                @else
                                <p style="color:red">Could Not Find this record.</p>
                                @endif


                            </div>
                            
                            <div class="modal-footer">
                                        
                
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                padding: .84rem 2.14rem;
                                font-size: 18px;color: #fff;">Close</button>
                                                            
                
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                            <!-- /.modal-dialog -->
             </div>
             
             
   
             
             

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
<!-- /.row -->

</section>
<!-- /.content -->
@endsection