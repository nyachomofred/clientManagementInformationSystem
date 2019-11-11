@extends('layouts.master')
@section('content')
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
              <h3 class="box-title">Sent Messages</h3>

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
                        <th>Message Id</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        
                    </tr>
                </thead>

                  <tbody>
                  @if(!empty($data))
                  @foreach($data as $key=>$record)
                  <tr>
                    <td>{{++$key}}</td>
                    <td class="mailbox-name"><a href="{{url('/messages/readMessage/'.$record->message_id)}}">{{$record->subject}}</a></td>
                    <td>{{$record->message_id}}</td>
                    <td class="mailbox-subject"><b></b>  {{$record->message}}
                    </td>
                    <td class="mailbox-date">{{$record->day}}/{{$record->month}}/{{$record->year}} {{$record->dayTime}}</td>
                  </tr>
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