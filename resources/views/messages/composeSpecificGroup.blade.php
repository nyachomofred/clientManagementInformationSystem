@extends('layouts.master')
@section('content')
 <!-- Main content -->
 <?php
$clients=DB::table('clients')->get();
?>
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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message [This message will be sent only to the selected people]</h3>
            </div>
            <form method="POST" action="{{route('messages.sendToSpecific')}}">
            @csrf
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <select class="form-control select2" multiple="multiple" data-placeholder="To" style="width: 100%;" name="phonenumbers[]">
                        @if(!empty($clients))
                          @foreach($clients as $client)
                          <option value="{{$client->phonenumber}}">{{$client->firstname}} {{$client->lastname}}</option>
                          @endforeach
                        @endif
                        </select>
                    </div>

                  <div class="form-group">
                    <input class="form-control" placeholder="Subject:" name="subject">
                  </div>
                  <div class="form-group">
                        <textarea id="compose-textarea" class="form-control" style="height: 300px" name="message">
                        
                        </textarea>
                  </div>
                  
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                  
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                  <a href="{{route('messages.inbox')}}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                </div>
            
            </form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection