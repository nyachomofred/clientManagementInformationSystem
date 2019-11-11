@extends('layouts.master')
@section('content')
<!-- Main content -->
<section class="content">
      <div class="row">
      <div class="col-md-3">
          <a href="{{route('mails.compose')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>

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
                
                  <li><a href="{{route('mails.sent')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <li><a href="{{route('mails.index')}}"><i class="fa fa-file-text-o"></i> Drafts</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>

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
              From: ormclients@gmail.com  &nbsp; To:{{$sentmail->name}}
             
                <span class="mailbox-read-time pull-right">{{$sentmail->day}}/{{$sentmail->month}}/{{$sentmail->year}} {{$sentmail->dayTime}}</span></h5>
              @else
              @endif
               
              </div>
              
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                @if(!empty($sentmail))
                <p>Hello John,</p>
                <p>{{$sentmail->message}}</p>
                @else
                  <p>No message body</p>
                @endif
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            @if(!empty($ccmails))
            <div class="box-footer">
              <h3>CC</h3>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      
                        <tbody>
                    @foreach($ccmails as $record)
                        <tr>
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
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$file->file}}</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              @endforeach

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