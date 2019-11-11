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
$clients=count(DB::table('clients')->get());
?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$clients}} &nbsp;Clients /Members</h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="float:right;"><i class="fa fa-user-plus"> Add New Client </i></button>
                             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
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
                        @foreach($data as $record)
                        <tr>
                            <td>{{$record->member_id}}</td>
                            <td>{{$record->firstname}} {{$record->lastname}}</td>
                            <td>{{$record->member_type}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->phonenumber}}</td>
                            <td>{{$record->location}}</td>                          
                            <td>{{$record->place_of_work}}</td>
                            <td>{{$record->role}}</td>
                          
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
                                            <li><a href="#" data-toggle="modal" data-target="#delete{{$record->id}}"><i class="fa fa-trash">Delete</i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </td>
                        </tr>

                       
                        <div class="modal fade" id="delete{{$record->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Are You sure you want to delete this record ?</h4>
                                        
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
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Update Member/Client</h4>
                                        
                                    </div>
                                <form class="form-horizontal" method="POST" action="{{route('clients.update')}}">
                                    @csrf
                                    <div class="modal-body">

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
                <tfoot>
                     <tr>
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
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add New Member/Client</h4>

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
                        <div class="modal-body">

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
                                <label class="col-sm-4 control-label">Lastname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lastname" placeholder="Delegate Lastname" value="{{old('lastname')}}" required>
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
                                <label class="col-sm-4 control-label">Email Address</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Phonenumber</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="phonenumber" placeholder="eg 07xxxxxxxxxx" value="{{old('phonenumber')}}">
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