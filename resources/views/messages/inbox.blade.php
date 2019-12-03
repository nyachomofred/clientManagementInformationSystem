@extends('layouts.master')
@section('content')
<!-- Main content -->
<section class="content">
      <div class="row">
        
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sent Messages</h3>


              <a href="{{action('ExportManagementController@messagepdf')}}"><i class="fa fa-download"></i>Export Pdf</a>|
              <a href="{{action('ExportManagementController@messagecsv')}}"><i class="fa fa-download">Export Csv</i></a>|
              <a href="{{action('ExportManagementController@messageexcel')}}"><i class="fa fa-download">Export Excel</i></a>|


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
                        <th>status</th>
                        <th>Date Received</th>
                        <th>Action</th>
                        
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
                    <td><span class="label label-success">Received</span></td>
                    <td class="mailbox-date">{{$record->day}}/{{$record->month}}/{{$record->year}} {{$record->dayTime}}</td>
                    <td><a href="{{url('/messages/readMessage/'.$record->message_id)}}" class="btn btn-xs btn-primary">More Info</a></td>

                   

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