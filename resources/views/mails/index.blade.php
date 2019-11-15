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
                      
                    <li><a href="{{route('mails.composeToAllMember')}}"><i class="fa fa-file-text-o"></i>Compose email to all members</a></li>
                    <li><a href="{{route('mails.composeToAssociateMember')}}"><i class="fa fa-file-text-o"></i>Compose email to associate members</a></li>
                    <li><a href="{{route('mails.composeToFullMember')}}"><i class="fa fa-file-text-o"></i>Compose email full Members</a></li>
                    <li><a href="{{route('mails.composeToPracticingMember')}}"><i class="fa fa-file-text-o"></i>Compose email to Practicing Members</a></li>
                    <li><a href="{{route('mails.compose')}}"><i class="fa fa-file-text-o"></i> Compos email to specific members</a></li>
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
                <li><a href="{{route('mails.index')}}"><i class="fa fa-file-text-o"></i> Drafts</a></li>
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
              <h3 class="box-title">Sent Mails</h3>
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
                       <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($data))
                      @foreach($data as $key=>$record)
                        <tr>
                          <td>{{++$key}}</td>
                          <td><a href="{{url('/mails/readSentMails/'.$record->message_id)}}">MSG/{{$record->message_id}}/{{$record->year}}</a></td>
                          <td>{{$record->subject}}</td>
                          <td>{{$record->message}}</td>
                          <td>{{$record->day}} {{$record->month}} {{$record->year}}: {{$record->dayTime}}</td>
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