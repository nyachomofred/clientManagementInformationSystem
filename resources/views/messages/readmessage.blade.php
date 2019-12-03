@extends('layouts.master')
@section('content')
<!-- Main content -->
<section class="content">
      <div class="row">
     
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
              <a href="{{route('messages.inbox')}}"><i class="fa fa-backward">Go Back</i></a>
                &nbsp; &nbsp; &nbsp; Read Message
              
              </h3>
              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
               @if(!empty($sms))
                <h3>Subject : {{$sms->subject}}</h3>
                <h5>
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