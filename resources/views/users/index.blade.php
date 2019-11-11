@extends('layouts.master')
@section('content')
<!-- Main content -->
<?php
$users=count(DB::table('users')->get());
?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$users}} &nbsp;Users</h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="float:right;"><i class="fa fa-user-plus"> Add New User </i></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                       
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
                                <div class="margin">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#" data-toggle="modal" data-target="#update{{$record->id}}"><i class="fa fa-eye">Update</i></a></li>
                                            
                                        </ul>
                                    </div>

                                </div>
                            </td>
                        </tr>


                        <div class="modal fade" id="update{{$record->id}}">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Update User</h4>
                                    
                                </div>
                            <form class="form-horizontal" method="POST" action="{{route('users.updateuser')}}">
                                @csrf
                                <div class="modal-body">

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
                                            <input type="text" class="form-control" name="role" value="{{$record->role}}">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
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

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Firstname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="firstname" value="{{$record->firstname}}">
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
                     <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Password</th>
                        <th>Action</th>
                     </tr>
                </tfoot>
              </table>

              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add New User</h4>
                            
                        </div>
                    <form class="form-horizontal" method="POST" action="{{route('users.adduser')}}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Firstname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="firstname">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Lastname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lastname">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Role</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="role">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
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