@extends('layouts.master')
@section('content')
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
$draft=count(DB::table('drafts')->get());
$clients=DB::table('clients')->get();
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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$draft}} Draft Messages</h3>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style="float:right;">Draft New Message</a>
              <div class="box-tools pull-right">
                <div class="has-feedback">
                 
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
               
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" id="example1">

                <thead>
                    <tr>
                       
                        <th>#</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date Created</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>

                  <tbody>
                  @if(!empty($data))
                  @foreach($data as $key=>$record)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$record->subject}}</td>
                    <td>{{$record->message}}</td>
                    <td class="mailbox-date">{{$record->day}}/{{$record->month}}/{{$record->year}} {{$record->dayTime}}</td>

                    <td>
                        <div class="margin">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Action</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" data-toggle="modal" data-target="#send{{$record->id}}"><i class="fa fa-trash">Send message</i></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#update{{$record->id}}"><i class="fa fa-eye">Update</i></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#delete{{$record->id}}"><i class="fa fa-trash">Delete</i></a></li>
                                </ul>
                            </div>

                        </div>
                    </td>

                  </tr>

                  <div class="modal fade" id="send{{$record->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Send message</h4>
                        </div>
                     <form class="form-horizontal" method="POST" action="{{route('messages.sendToSpecific')}}">
                         @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Select recipient</label>
                                    <div class="col-sm-10">
                                    
                                    <select class="form-control select2" multiple="multiple" data-placeholder="To" style="width: 100%;" name="phonenumbers[]" required>
                                        @if(!empty($clients))
                                        @foreach($clients as $client)
                                        <option value="{{$client->phonenumber}}">{{$client->firstname}} {{$client->lastname}}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    </div>
                                </div>

                            <br><br>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subject" required   value="{{$record->subject}}">
                                </div>
                            </div>
                            <br><br>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                   <textarea name="message" class="form-control" required >{{$record->message}}</textarea>
                                </div>
                            </div>
    
                            <br><br>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send</button>
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
                            <h4 class="modal-title">Update Message</h4>
                        </div>
                     <form class="form-horizontal" method="POST" action="{{route('messages.updateDraftMessage')}}">
                         @csrf
                            <div class="modal-body">


                            <div class="form-group" style="display:none">
                                <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id" value="{{$record->id}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subject" required   value="{{$record->subject}}">
                                </div>
                            </div>
                            <br><br>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                   <textarea name="message" class="form-control" required >{{$record->message}}</textarea>
                                </div>
                            </div>
    
                            <br><br>
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




                  <div class="modal fade" id="delete{{$record->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Are you sure you want to delete this record</h4>
                        </div>
                     <form class="form-horizontal" method="POST" action="{{route('messages.deleteDraftMessage')}}">
                         @csrf
                            <div class="modal-body">

                            <div class="form-group" style="display:none">
                                <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-10">
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


                  @endforeach
                @endif
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Draft New Message</h4>
                        </div>
                     <form class="form-horizontal" method="POST" action="{{route('messages.saveDraftMessage')}}">
                         @csrf
                            <div class="modal-body">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="subject" id="inputEmail3" placeholder="Enter Subject" value="{{old('subject')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                   <textarea name="message" class="form-control" required value="{{old('message')}}"></textarea>
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
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection