
@extends('layouts.master')
@section('content')
<?php
$fullmembers=count(DB::table('clients')->where(['member_type'=>'Practicing'])->get());
$data=DB::table('clients')->where(['member_type'=>'Practicing'])->get();
?>
<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-md-3">
          
           <div class="btn-group">
                  <button type="button" class="btn btn-primary" style="width:265px;">Compose Message</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                      
                    <li><a href="{{route('messages.composespecificgroup')}}"><i class="fa fa-file-text-o"></i>Compose Message to specific people</a></li>
                    <li><a href="{{route('messages.composepracticingmember')}}"><i class="fa fa-file-text-o"></i> Compos Message to Practicing Members</a></li>
                    <li><a href="{{route('messages.composefullmember')}}"><i class="fa fa-file-text-o"></i>Compose Message to  Fullmembers</a></li>
                    <li><a href="{{route('messages.composeassociatemember')}}"><i class="fa fa-file-text-o"></i>Compose Message to Associate Members</a></li>
                    <li><a href="{{route('messages.composeToAll')}}"><i class="fa fa-file-text-o"></i>Compose Message to all Members</a></li>
                    
                  </ul>
            </div>
            <br><br>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{route('messages.inbox')}}"><i class="fa fa-envelope-o"></i> Sent Messages</a></li>
                <li><a href="{{route('messages.draftmessage')}}"><i class="fa fa-file-text-o"></i> Drafts Messages</a></li>             
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         
        </div>
        <!-- /.col -->
        <div class="col-md-9">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message [This message shall be received by {{$fullmembers}} Practicing members] <a href="#" class="btn btn-link" data-toggle="modal" data-target="#modal-default">View Recipient</a></h3>

            </div>
            <form method="POST" action="{{route('messages.sendToPracticingMember')}}">
           @csrf
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="subject">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="message" required>
                     
                    </textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
              
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              <a href="{{route('messages.inbox')}}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
            </div>
            <!-- /.box-footer -->
            </form>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


              <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Recipient</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                  <thead>
                                     <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phonenumber</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Phonenumber</th>
                                     </tr>
                                  <thead>
                                  @if(!empty($data))
                                  <tbody>
                                     @foreach($data as $key=>$record)
                                      <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$record->firstname}} {{$record->lastname}}</td>
                                        <td>{{$record->email}}</td>
                                        <td>{{$record->phonenumber}}</td>
                                        <td>{{$record->location}}</td>
                                        <td>{{$record->place_of_work}}</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                  @else
                                  No record
                                  @endif
                            </table>
                        </div>
                      
                        </div>
                        <!-- /.modal-content -->
                    </div>
                <!-- /.modal-dialog -->
                </div>

@endsection


