@extends('layouts.master')
@section('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Main content -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php
$clients=count(DB::table('clients')->get());
?>

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
              <h3 class="box-title">{{$clients}} 
                  &nbsp;Clients /Members  &nbsp; &nbsp;
              </h3>
             
               <div class="btn-group" role="group" aria-label="..." style="float:right;">
                  
                  <a href="{{action('ExportManagementController@clientcsv')}}" class="btn btn-warning" ><i class="fa fa-download">Export Csv</i></a>
                  <a href="{{action('ExportManagementController@clientexcel')}}" class="btn btn-info"><i class="fa fa-download">Export Excel</i></a>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style=""><i class="fa fa-user-plus"> Add New Client </i></button>
                
                </div>
             
               
                 <form style="float:right;" method="POST" action="{{route('clients.searchclient')}}" >
                     @csrf
                     <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                      <input type="text" name="search" class="form-control pull-right" placeholder="Search">
    
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search" ></i></button>
                      </div>
                    </div>
                </form>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table" style="border: 1px solid #1d96b2;" id="example2">
                <thead>
                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                        <th>#</th>
                        <th>Member No</th>
                        <th>Name</th>
                        <th>Membership Type</th>
                        <th>Email</th>
                        <th>Phonenumber</th>
                        <th>City</th>
                        <th>Organisation</th>
                        <th>Job Title</th>
                       
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($data))
                        @foreach($data as $key=>$record)
                        <tr style="border: 1px solid #1d96b2;">
                            <td>{{++$key}}</td>
                            <td>{{$record->member_id}}</td>
                            <td>{{$record->firstname}} {{$record->lastname}}</td>
                            <td>{{$record->member_type}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->phonenumber}}</td>
                            <td>{{$record->location}}</td>                          
                            <td>{{$record->place_of_work}}</td>
                            <td>{{$record->role}}</td>
                          
                            
                            <td>
                                 <a href="#" data-toggle="modal" data-target="#action{{$record->id}}" class="btn btn-success btn-xs"><i class="fa fa-edit">Action</i></a>
                            </td>
                            
                        </tr>
                        
                         <div class="modal fade" id="action{{$record->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                        
                                        <h4 class="modal-title"><center>Which action do you want to perform on this client ?</center></h4>
                                        
                                    </div>
                               
                                    <div class="modal-body">
                                        
                                            <ul>
                                                
                                                    <li><a href="#" data-toggle="modal" data-target="#update{{$record->id}}" style="color:#9e9e9e !important;"><i class="fa fa-edit" style="font-size:2rem;">Update</i></a></li><br>
                                                   
                                                    <li><a href="{{url('/messages/send/'.$record->client_no)}}" style="color:#9e9e9e !important;" ><i class="fa fa-envelope" style="font-size:2rem;">Send Message</i></a></li><br>
                                                    <li><a href="{{url('/mails/send/'.$record->client_no)}}" style="color:#9e9e9e !important;"><i class="fa fa-envelope" style="font-size:2rem;">Send Mail</i></a></li><br>
                                                    <li><a href="{{url('/invoices/InvoiceManagement/'.$record->client_no)}}" style="color:#9e9e9e !important;" style="font-size:2rem;"><i class="fa fa-book" style="font-size:2rem;">Invoice Management</i></a></li><br>
                                                   
                                                    <li><a href="#" data-toggle="modal" data-target="#delete{{$record->id}}" style="color:#9e9e9e !important;"><i class="fa fa-trash" style="font-size:2rem;">Archive</i></a></li>
                                            
                                            </ul>
                                       

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
                        

                       
                        <div class="modal fade" id="delete{{$record->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                        
                                        <h4 class="modal-title"><center>Are you sure you want to archive this record</center></h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('clients.delete')}}">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group" style="display:none;">
                                            <label class="col-sm-4 control-label">Id</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="id" value="{{$record->id}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        
                                        
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                                                                    <button type="submit" class="btn btn-primary" style="background-color: #4285f4 !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Archive</button>

                                    </div>
                                </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <div class="modal fade" id="mail{{$record->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Please select the mail type you would want to sent</h4>
                                        
                                    </div>
                                
                                    <div class="modal-body">

                                        <ul>
                                           
                                            <li><a href="{{url('/mails/send/'.$record->client_no)}}" ><i class="fa fa-envelope">Normal Mail</i></a></li>
                                            <li><a href="{{url('/mails/send/'.$record->client_no)}}" ><i class="fa fa-envelope">Mail a barner</i></a></li>
                                            <li><a href="{{url('/mails/send/'.$record->client_no)}}" ><i class="fa fa-envelope">Mail a poster</i></a></li>
                    
                                         </ul>

                                        

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                       
                                    </div>
                                
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                       

                        <div class="modal fade" id="createInvoice{{$record->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Create Invoice</h4>
                                        
                                    </div>
                                 <form class="form-horizontal" method="POST" action="{{route('invoices.insertInvoice')}}">
                                    @csrf
                                    <div class="modal-body">

                                    
                                    <div class="form-group" style="display:none">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Client no</label>
                                        <div class="col-sm-10"> 
                                        <input type="text" name="client_no" class="form-control" value="{{$record->client_no}}">
                                        </div>
                                       
                                    </div>
                               

                                <div class="form-group" style="display:none">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Member Id</label>
                                    <div class="col-sm-10"> 
                                       <input type="text" name="member_id" class="form-control" value="{{$record->member_id}}">
                                     </div>
                                       
                                </div>
                               

                                <div class="form-group" style="display:none">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
                                    <div class="col-sm-10"> 
                                       <input type="text" name="firstname" class="form-control" value="{{$record->firstname}}">
                                     </div>
                                       
                                </div>
                               

                                <div class="form-group" style="display:none">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
                                    <div class="col-sm-10"> 
                                       <input type="text" name="lastname" class="form-control" value="{{$record->lastname}}">
                                     </div>
                                       
                                </div>
                              

                                <div class="form-group" style="display:none">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"> 
                                       <input type="text" name="email" class="form-control" value="{{$record->email}}">
                                     </div>
                                       
                                </div>
                               

                                <div class="form-group" style="display:none">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Phonenumber</label>
                                    <div class="col-sm-10"> 
                                       <input type="text" name="phonenumber" class="form-control" value="{{$record->phonenumber}}">
                                     </div>
                                       
                                </div>
                             
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Invoice Name</label>
                                    <div class="col-sm-10"> 
                                       <input type="text" name="invoice_name" class="form-control" required>
                                     </div>
                                       
                                </div>

                                <br>
                                <br>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Due Date</label>
                                    <div class="col-sm-10"> 
                                       <input type="date" name="dueData" class="form-control" required>
                                     </div>
                                       
                                </div>


                                <br><br>
                                <div class="form-group">  
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" required></textarea>
                                    </div>
                                </div>




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


                        <div class="modal fade" id="update{{$record->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                        
                                        <h4 class="modal-title"><center>Update Member/Client</center></h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('clients.update')}}">
                                    @csrf
                                   <div class="modal-body" style="color:#9e9e9e !important;">

                                        <div class="form-group" style="display:none;">
                                            <label class="col-sm-4 control-label">ID</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="id" value="{{$record->id}}">
                                            </div>
                                        </div>
                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Member No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="member_id" value="{{$record->member_id}}">
                                            </div>
                                        </div>
                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Firstname</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="firstname" value="{{$record->firstname}}">
                                            </div>
                                        </div>
                                        <br> <br>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Middlename</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="middlename" value="{{$record->middlename}}">
                                            </div>
                                        </div>
                                        <br> <br>
                                        
                                         <div class="form-group">
                                            <label class="col-sm-4 control-label">Lastname</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="lastname" value="{{$record->lastname}}">
                                            </div>
                                        </div>
                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Phonenumber</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="phonenumber" value="{{$record->phonenumber}}">
                                            </div>
                                        </div>

                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Email Address</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" value="{{$record->email}}">
                                            </div>
                                        </div>

                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Organisation</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="place_of_work" value="{{$record->place_of_work}}">
                                            </div>
                                        </div>

                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Job Title</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="role" value="{{$record->role}}">
                                            </div>
                                        </div>

                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">City</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="location" value="{{$record->location}}">
                                            </div>
                                        </div>
                                        <br> <br>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Membership Type</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="member_type" value="{{$record->member_type}}">
                                            </div>
                                        </div>

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
                <tfoot>
                     <tr style="background-color:rgb(29, 150, 178);color:white;">
                        <th>#</th>
                        <th>Member No</th>
                        <th>Name</th>
                        <th>Membership Type</th>
                        <th>Email</th>
                        <th>Phonenumber</th>
                        <th>City</th>
                        <th>Organisation</th>
                        <th>Job Title</th>
                        <th>Action</th>
                     </tr>
                </tfoot>
              </table>


              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                            
                            <h4 class="modal-title"><center>MEMBER REGISTRATION FORM</center></h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            
                        </div>
                    <form class="form-horizontal" method="POST" action="{{route('clients.add')}}">
                        @csrf
                        <div class="modal-body" style="color:#9e9e9e !important;">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Member No</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="member_id" value="{{old('member_id')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Firstname </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="firstname" placeholder="Delegate Firstname" value="{{old('firstname')}}" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Middlename </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="Middlename" placeholder="Delegate Middlename" value="{{old('middlename')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Lastname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lastname" placeholder="Delegate Lastname" value="{{old('lastname')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email Address</label>
                                <div class="col-sm-8">
                                    <input type="" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Membership Type</label>
                                <div class="col-sm-8">
                                   
                                    <select class="form-control" name="member_type" required>
                                        <option value="">Select member type</option>
                                        <option value="Practicing">Practicing</option>
                                        <option value="Associate">Associate</option>
                                        <option value="Fullmember">Fullmember</option>
                                    </select>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Phonenumber</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="phonenumber" placeholder="eg 2547xxxxxxxxxx" value="{{old('phonenumber')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="location" value="{{old('location')}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 control-label">Organisation</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="place_of_work" value="{{old('place_of_work')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Job title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="role" value="{{old('role')}}">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
padding: .84rem 2.14rem;
font-size: 18px;color: #fff;">Close</button>
                            <button type="submit" class="btn btn-primary" style="background-color: #4285f4 !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
padding: .84rem 2.14rem;
font-size: 18px;color: #fff;">Save</button>
                            
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


    <script type="text/javascript">
        $(document).ready(function() {

          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });

          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });

        });
</script>
@endsection