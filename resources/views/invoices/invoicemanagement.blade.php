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
              <h3 class="box-title"> <a href="{{route('clients.index')}}"><i class="fa fa-backward"></i></a>&nbsp;&nbsp; Available Invoices for :
                @if(!empty($client))
                  {{$client->firstname}} {{$client->lastname}}
                @endif
              </h3>     
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInvoice" style="float:right;"><i class="fa fa-user-plus"> Create New Invoice </i></button>         
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($invoices))
                        @foreach($invoices as $key=>$invoice)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$invoice->invoice_no}}</td>
                            <td>{{$invoice->invoice_name}}</td>
                            <td>{{$invoice->day}} /{{$invoice->month}} /{{$invoice->year}}  {{$invoice->dayTime}}</td>
                            <td>{{$invoice->dueData}}</td>
                          
                            <td>
                                <div class="margin">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#" data-toggle="modal" data-target="#additem{{$invoice->id}}"><i class="fa fa-eye">Add Item To Invoice</i></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#update{{$invoice->id}}"><i class="fa fa-eye">Update Invoice</i></a></li>
                                            <li><a href="{{url('/invoices/addItemInvoicePage/'.$invoice->invoice_no)}}" ><i class="fa fa-eye">View Item In Invoice/Download Invoice</i></a></li>
                                            
                                            <li><a href="#" data-toggle="modal" data-target="#delete{{$invoice->id}}"><i class="fa fa-trash">Delete Invoice</i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </td>
                        </tr>

                       
                        <div class="modal fade" id="delete{{$invoice->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Are You sure you want to delete this record ?</h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('invoices.deleteInvoice')}}">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group" style="display:none;">
                                            <label class="col-sm-4 control-label">Id</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="id" value="{{$invoice->id}}">
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


                        <div class="modal fade" id="update{{$invoice->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Update Invoice</h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('invoices.updateInvoice')}}">
                                    @csrf
                                    <div class="modal-body">


                                        <div class="form-group" style="display:none;">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Invoice Id</label>
                                            <div class="col-sm-10"> 
                                            <input type="text" name="id" class="form-control" required value="{{$invoice->id}}">
                                            </div>
                                        
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Invoice Name</label>
                                            <div class="col-sm-10"> 
                                            <input type="text" name="invoice_name" class="form-control" required value="{{$invoice->invoice_name}}">
                                            </div>
                                            
                                        </div>

                                        <br> <br>
                               

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Due Date</label>
                                            <div class="col-sm-10"> 
                                            <input type="date" name="dueData" class="form-control" required value="{{$invoice->dueData}}">
                                            </div>
                                            
                                        </div>

                                        <br>  <br>

                                        

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

                        <div class="modal fade" id="additem{{$invoice->id}}">
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
                                                <input type="text" name="invoice_no" class="form-control" value="{{$invoice->invoice_no}}">
                                            </div>
                                            
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Item Type/Name</label>
                                            <div class="col-sm-10"> 
                                                <input type="text" name="itemType" class="form-control" required>
                                            </div>
                                            
                                        </div>

                                        <br>  <br>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                            <div class="col-sm-10"> 
                                                <textarea name="description" class="form-control"></textarea>  
                                            </div>
                                            
                                        </div>

                                        <br>  <br>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Quantity (Qty)</label>
                                            <div class="col-sm-10"> 
                                               <input type="number" name="qty" class="form-control" min='1' max="1000000"  required>
                                            </div>
                                            
                                        </div>

                                        <br>  <br>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Unit Price</label>
                                            <div class="col-sm-10"> 
                                                <input type="number" name="unitPrice" class="form-control" min='1' max="10000000000" step="0.01" required>
                                            </div>
                                            
                                        </div>

                                        <br>  <br>


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


                

                        @endforeach
                    @endif
                </tbody>
                
              </table>
                

              <div class="modal fade" id="createInvoice">
                @if(!empty($client))
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Create New  Invoice</h4>
                                
                            </div>
                            <form class="form-horizontal" method="POST" action="{{route('invoices.insertInvoice')}}">
                            @csrf
                            <div class="modal-body">

                            
                            <div class="form-group" style="display:none">
                                <label for="inputEmail3" class="col-sm-2 control-label">Client no</label>
                                <div class="col-sm-10"> 
                                <input type="text" name="client_no" class="form-control" value="{{$client->client_no}}">
                                </div>
                                
                            </div>
                        

                        <div class="form-group" style="display:none">
                            <label for="inputEmail3" class="col-sm-2 control-label">Member Id</label>
                            <div class="col-sm-10"> 
                                <input type="text" name="member_id" class="form-control" value="{{$client->member_id}}">
                                </div>
                                
                        </div>
                        

                        <div class="form-group" style="display:none">
                            <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
                            <div class="col-sm-10"> 
                                <input type="text" name="firstname" class="form-control" value="{{$client->firstname}}">
                                </div>
                                
                        </div>
                        

                        <div class="form-group" style="display:none">
                            <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
                            <div class="col-sm-10"> 
                                <input type="text" name="lastname" class="form-control" value="{{$client->lastname}}">
                                </div>
                                
                        </div>
                        

                        <div class="form-group" style="display:none">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"> 
                                <input type="text" name="email" class="form-control" value="{{$client->email}}">
                                </div>
                                
                        </div>
                        

                        <div class="form-group" style="display:none">
                            <label for="inputEmail3" class="col-sm-2 control-label">Phonenumber</label>
                            <div class="col-sm-10"> 
                                <input type="text" name="phonenumber" class="form-control" value="{{$client->phonenumber}}">
                                </div>
                                
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Invoice Name</label>
                            <div class="col-sm-10"> 
                                <input type="text" name="invoice_name" class="form-control" required>
                                </div>
                                
                        </div>

                        
                        <br>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Due Date</label>
                            <div class="col-sm-10"> 
                                <input type="date" name="dueData" class="form-control" required>
                                </div>
                                
                        </div>


                        



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create Invoice</button>
                            </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                          
                @endif
            </div>



            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
@endsection