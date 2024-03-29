@extends('layouts.master')
@section('content')
 <!-- Main content -->
 <?php
$clients=DB::table('clients')->get();
?>
 <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">

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
            <form method="POST" action="{{route('infobips.sendToSpecific')}}">
            @csrf
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                       <label class="col-sm-2 control-label">Recipient</label>
                       <div class="col-sm-10">
                          <select class="form-control select2" multiple="multiple" data-placeholder="To" style="width: 100%;" name="phonenumbers[]">
                          @if(!empty($clients))
                            @foreach($clients as $client)
                            <option value="{{$client->phonenumber}}">{{$client->firstname}} {{$client->lastname}}</option>
                            @endforeach
                          @endif
                          </select>

                        </div>
                    </div>

                    <br><br>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10">
                           <input class="form-control" placeholder="Subject:" name="subject">
                        </div>
                    </div>
                    <br><br>


                    <div class="form-group">
                            <label class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control"  name="message"> </textarea>
                            </div>
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