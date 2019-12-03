@extends('layouts.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            @if(!empty($data))
              <h3 class="box-title">
               INVOICE No:{{$data->invoice_no}}<br><br>
               INVOICE NAME:{{$data->invoice_name}}<br><br>
               
               AVAILABLE ITEM: {{$totalitems}} <br><br>
               INVOICE DUE DATE: {{$data->dueData}}<br><br>
               DATE CREATED:  {{$data->year}}-{{$data->month}}-{{$data->day}}</h3> 
            @endif
              <form method="GET" action="{{ route('invoiceview',['download'=>'pdf']) }}" style="float:right;">
                  <input type="text" name="invoice_no" class="form-control" value="{{$data->invoice_no}}" style="display:none;">
                  <button type="submit" name="submit" class="btn btn-success" value="Download"><i class="fa fa-download">Download Invoice</i></button>
              </form> 
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addItem" style="float:right;"><i class="fa fa-user-plus"> Add New Item </i></button>
              @if(!empty($data))
              <a href="{{url('/invoices/InvoiceManagement/'.$data->client_no)}}" class="btn btn-success" data-toggle="modal"  style="float:right;"><i class="fa fa-user-backward"> Go Back </i></a>                                       
             @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
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
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Update Invoice Item</h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('invoices.updateInvoiceItem')}}">
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
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"> Add Item To Invoice</h4>
                                
                            </div>
                        <form class="form-horizontal" method="POST" action="{{route('invoices.insertInvoiceItem')}}">
                            @csrf
                            <div class="modal-body">


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
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
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