@extends('layouts.master')
@section('content')
<!-- Main content -->

<style>
   
    
    table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #1d96b2;
     
}
   }

</style>

<section class="content" style="background-color:white;">
      <div class="row">
       
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sent Mails</h3>

               <div class="btn-group" role="group" aria-label="..." style="float:right;">
                   <a href="{{action('ExportManagementController@mailpdf')}}" class="btn btn-info"><i class="fa fa-download">Export Pdf</i></a>
                  
                  <a href="{{action('ExportManagementController@mailcsv')}}" class="btn btn-warning" ><i class="fa fa-download">Export Csv</i></a>
                  <a href="{{action('ExportManagementController@mailexcel')}}" class="btn btn-info"><i class="fa fa-download">Export Excel</i></a>
                  
                
                
                </div>
              
              
                

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                  <thead>
                   <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
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