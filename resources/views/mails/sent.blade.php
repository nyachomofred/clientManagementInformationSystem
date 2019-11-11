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
              <h3 class="box-title">Sent Mails</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
             
              <div class="table-responsive mailbox-messages">
              @if(!empty($sentmails))
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach($sentmails as $record)
                    <tr>
                      <td><input type="checkbox"></td>
                      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                      <td class="mailbox-name"><a href="{{url('/mails/readSentMails/'.$record->message_id)}}">{{$record->firstname}}{{$record->lastname}}</a></td>
                      <td class="mailbox-subject"><b>{{$record->subject}}</b> - Trying to find a solution to this problem...
                      </td>
                      <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                      <td class="mailbox-date">{{$record->day}}/{{$record->month}}/{{$record->year}} {{$record->dayTime}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                @else
                No sent mails. To send an emails go to compose section.
                @endif
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