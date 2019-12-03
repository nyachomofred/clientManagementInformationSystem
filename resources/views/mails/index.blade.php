@extends('layouts.master')
@section('content')
<!-- Main content -->
<section class="content">
      <div class="row">
       
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sent Mails</h3>

              <a href="{{action('ExportManagementController@mailpdf')}}"><i class="fa fa-download"></i>Export Pdf</a>|
              <a href="{{action('ExportManagementController@mailcsv')}}"><i class="fa fa-download">Export Csv</i></a>|
              <a href="{{action('ExportManagementController@mailexcel')}}"><i class="fa fa-download">Export Excel</i></a>|

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" id="example1">
                  <thead>
                    <tr>
                       <th>#</th>
                       <th>Email Id</th>
                       <th>Subject</th>
                       <th>Message</th>
                       <th>Date Sent</th>
                       <th>Status</th>
                       <th>Date Received</th>
                       <th>Action</th>
                       <th>Export Recipient</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($data))
                      @foreach($data as $key=>$record)
                        <tr>
                          <td>{{++$key}}</td>
                          <td><a href="{{url('/mails/readSentMails/'.$record->message_id)}}">MSG/{{$record->message_id}}/{{$record->year}}</a></td>
                          <td>{{$record->subject}}</td>
                          <td><?php echo $record->message?></td>
                          <td>{{$record->day}} {{$record->month}} {{$record->year}}: {{$record->dayTime}}</td>
                          <td><span class="label label-success">Received</span></td>
                          <td>{{$record->day}} {{$record->month}} {{$record->year}}: {{$record->dayTime}}</td>
                          <td><a href="{{url('/mails/readSentMails/'.$record->message_id)}}" class="btn btn-xs btn-primary">More Info</a></td>
                          <td>
                               <form  method="POST" action="{{route('exports.ccmailpdf')}}">
                               @csrf
                                  <input type="text" name="message_id" value="{{$record->message_id}}" style="display:none;">
                                  <input type="submit" class="btn btn-xs btn-primary" value="Export Recipient">
                               </form>
                          </td>
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