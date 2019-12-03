@extends('layouts.master')
@section('content')
<!-- Main content -->
<section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> &nbsp;Created Invoices</h3>              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>Name</th>
                        <th>Description</th>
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
                            <td>{{$invoice->description}}</td>
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
                                            <li><a href="#" data-toggle="modal" data-target="#update{{$invoice->id}}"><i class="fa fa-eye">Update</i></a></li>
                                            <li><a href="{{url('/invoices/addItemInvoicePage/'.$invoice->invoice_no)}}" ><i class="fa fa-plus">Add item to invoice</i></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete{{$invoice->id}}"><i class="fa fa-trash">Delete</i></a></li>
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

                                        <div class="form-group">  
                                            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" class="form-control" required>{{$invoice->description}}</textarea>
                                            </div>
                                        </div>

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