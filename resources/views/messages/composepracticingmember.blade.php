
@extends('layouts.master')
@section('content')
<?php
$fullmembers=count(DB::table('clients')->where(['member_type'=>'Practicing'])->get());
$data=DB::table('clients')->where(['member_type'=>'Practicing'])->get();
?>
<!-- Main content -->
<section class="content">
      <div class="row">
       
        <div class="col-md-12">

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
              <h3 class="box-title"><a href="{{route('messages.inbox')}}"> <i class="fa fa-backward"></i>Go Back</a> &nbsp; &nbsp; Compose New Message [This message shall be received by {{$fullmembers}} Associate members] <a href="#" class="btn btn-link" data-toggle="modal" data-target="#modal-default">View Recipient</a>

            </div>
            <form method="POST" action="{{route('messages.sendToPracticingMember')}}">
           @csrf
            <div class="box-body">
            <div class="form-group">
                        <label class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10">
                           <input class="form-control" placeholder="Subject:" name="subject">
                        </div>
                </div>

                <br>
                <br>
                <div class="form-group">
                        <label class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                             <textarea  class="form-control"  name="message"> </textarea>
                        </div>
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


