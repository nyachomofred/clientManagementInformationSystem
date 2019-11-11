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
              <h3 class="box-title">Read Message</h3>
              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
               @if(!empty($sms))
                <h3>Message Subject : {{$sms->subject}}</h3>
                <h5>From: help@example.com
                  <span class="mailbox-read-time pull-right">{{$sms->day}}/{{$sms->month}}/{{$sms->year}} {{$sms->dayTime}}</span></h5>
               @endif
              </div>
              <!-- /.mailbox-read-info -->
              
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <h3>Message</h3>
                @if(!empty($sms))
                   <p>{{$sms->message}}</p>
                @endif
              
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <h3>Recipient</h3>
              @if(!empty($ccsms))
              <table class="table">
                <thead>
                   <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>phonenumber</th>
                   </tr>
                </thead>
                <tbody>
                @foreach($ccsms as $key=>$record)
                   <tr>
                     <td>{{++$key}}</td>
                     <td>{{$record->firstname}} {{$record->lastname}}</td>
                     <td>{{$record->phonenumber}}</td>
                   </tr>
                @endforeach
                </tbody>
              </table>
              @endif
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