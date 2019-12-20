@extends('layouts.master')
@section('content')
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
$users=count(DB::table('users')->get());
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

<section class="content" style="background-color:white;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$users}} &nbsp;Users</h3>

              
               <div class="btn-group" role="group" aria-label="..." style="float:right;">
                   
                   <a href="{{action('ExportManagementController@userpdf')}}" class="btn btn-warning" ><i class="fa fa-download"></i>Export Pdf</a>
                  <a href="{{action('ExportManagementController@usercsv')}}" class="btn btn-info"><i class="fa fa-download">Export Csv</i></a>
                  <a href="{{action('ExportManagementController@userexcel')}}" class="btn btn-primary"><i class="fa fa-download">Export Excel</i></a>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="float:right;"><i class="fa fa-user-plus"> Add New User </i></button>
              
                </div>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table" style="border: 1px solid #1d96b2;">
                <thead>
                   <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                       
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($data))
                        @foreach($data as $key=>$record)

                       

                       

                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$record->firstname}}</td>
                            <td>{{$record->lastname}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->role}}</td>
                            <td>{{$record->passwordPlainText}}</td>
                            <td>
                                
                                <a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#action{{$record->id}}"><i class="fa fa-edit">Action</i></a>
                            </td>


                            <div class="modal fade" id="action{{$record->id}}">
                            <div class="modal-dialog">
                            <div class="modal-content">
                               <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                        
                                        <h4 class="modal-title"><center>Which action do you want to perform on this user</center></h4>
                                        
                                </div>
                           
                                <div class="modal-body">
                                       <ul>
                                            <li><a href="#" data-toggle="modal" data-target="#update{{$record->id}}" style="color:#9e9e9e !important;"><i class="fa fa-eye" style="font-size:2rem;">Update</i></a></li><br>
                                            <li><a href="#" data-toggle="modal" data-target="#delete{{$record->id}}" style="color:#9e9e9e !important;"><i class="fa fa-eye" style="font-size:2rem;">Archive</i></a></li><br>
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


                        <div class="modal fade" id="delete{{$record->id}}">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Are you sure you want to delete this record ?</h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('users.deleteuser')}}">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group" style="display:none">
                                            <label class="col-sm-4 control-label">Id</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="id" value="{{$record->id}}">
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


                        </tr>

                            


                        <div class="modal fade" id="update{{$record->id}}">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                   
                                   <h4 class="modal-title"><center>Update user</center></h4>
                                    
                                </div>
                            <form class="form-horizontal" method="POST" action="{{route('users.updateuser')}}">
                                @csrf
                                 <div class="modal-body" style="color:#9e9e9e !important;">

                                    <div class="form-group" style="display:none">
                                        <label class="col-sm-4 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="id" value="{{$record->id}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Firstname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="firstname" value="{{$record->firstname}}">
                                        </div>
                                    </div>

                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Lastname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="lastname" value="{{$record->lastname}}">
                                        </div>
                                    </div>
                                    
                                    <br> <br>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Email Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="email"  value="{{$record->email}}">
                                        </div>
                                    </div>
                                    
                                    <br> <br>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="password" value="{{$record->passwordPlainText}}">
                                        </div>
                                    </div>

                                    <br> <br>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>

                                    <br> <br>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Role</label>
                                        <div class="col-sm-8">
                                           <select class="form-control" name="role">
                                              <option value="{{$record->role}}">{{$record->role}}</option>
                                              <option value="Super Admin">Super Admin</option>
                                              <option value="Admin">Admin</option>
                                              <option value="User">User</option>
                                           </select>
                                           
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
               
              </table>

              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                                   
                                   <h4 class="modal-title"><center>Add new user</center></h4>
                                    
                        </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                        
                    <form class="form-horizontal" method="POST" action="{{route('users.adduser')}}">
                        @csrf
                       <div class="modal-body" style="color:#9e9e9e !important;">


                            <div class="form-group">
                                <label class="col-sm-4 control-label">Firstname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="firstname"  value="{{old('firstname')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Lastname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lastname"  value="{{old('lastname')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-4 control-label">Role</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="role" required>
                                       
                                        <option value="">Select Role</option>
                                        <option value="Super Admin">Super Admin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                    
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
                                        font-size: 18px;color: #fff;" >Save</button>
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