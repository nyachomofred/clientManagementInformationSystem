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


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             
              <form  method="POST" action="{{route('reports.clientreport')}}">
              @csrf
                    <div class="row">

                       <div class="col-sm-2">
                           <label>Membership Type</label>
                            <select name="member_type"class="form-control">
                            @if(!empty($data))
                               @foreach($data as $record)
                                <option value="{{$record->member_type}}">{{$record->member_type}}</option>
                               @endforeach
                            @endif
                            </select>
                       </div>


                       <div class="col-sm-2">
                           <label>Year of admision</label>
                            <select name="year" class="form-control">
                            @if(!empty($data))
                               @foreach($data as $record)
                                <option value="{{$record->year}}">{{$record->year}}</option>
                               @endforeach
                            @endif
                            </select>
                       </div>

                       <div class="col-sm-2">
                           <br>
                            <input type="submit" class="btn btn-primary" value="Filter and Generate Report">
                       </div>


                    </div>
              </form> 
             
            
              
                             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-striped">
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
                          
                            
                        </tr>
                       

                        @endforeach
                    @endif
                </tbody>
               
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