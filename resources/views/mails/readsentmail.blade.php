@extends('layouts.master')
@section('content')
<!-- Main content -->
<section class="content">
      <div class="row">
      
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> <a href="{{route('mails.index')}}"><i class="fa fa-backward"></i>Go Back</a> &nbsp;&nbsp; Read Mail</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
              @if(!empty($sentmail))
              <h3>Subject:{{$sentmail->subject}}</h3>
              <h5>
              From: ormclients@gmail.com  
             
                <span class="mailbox-read-time pull-right">{{$sentmail->day}}/{{$sentmail->month}}/{{$sentmail->year}} {{$sentmail->dayTime}}</span></h5>
              @else
              @endif
               
              </div>
              
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              
              
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                 <h3>Message</h3>
                @if(!empty($sentmail))
               
                <p><?php echo $sentmail->message?>
                @else
                  <p>No message body</p>
                @endif
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            @if(!empty($ccmails))
            <div class="box-footer">
              <h3>Recipients</h3>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>email Address</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($ccmails as $key=>$record)
                        <tr>
                        <td class="mailbox-name">{{++$key}}</td>
                        <td class="mailbox-name">{{$record->firstname}} {{$record->lastname}}</td>
                        <td class="mailbox-name">{{$record->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                    </table>
                </div>
            </div>
            @endif
            <!-- /.box-body -->
            <div class="box-footer">
              <h4>Attachments</h4>
             @if(!empty($files))
                  <ul class="mailbox-attachments clearfix">
                        @foreach($files as $file)

                          <li>
                            <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                            <div class="mailbox-attachment-info">
                              <a href="/image/{{$file->file}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$file->file}}</a>
                                  <span class="mailbox-attachment-size">
                                    1,245 KB
                                    <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                  </span>
                            </div>
                          </li>
                        @endforeach
            @else
                
                  </ul>
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