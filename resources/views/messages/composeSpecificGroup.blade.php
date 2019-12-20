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
             <div class="box-header with-border" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
             <center> <h3 class="box-title"> <a href="{{route('messages.inbox')}}"> <i class="fa fa-backward"></i>Go Back</a> &nbsp; &nbsp; Compose New Message [This message will be sent only to the selected people]</h3></center>
            </div>
            <form method="POST" action="{{route('messages.sendToSpecific')}}">
            @csrf
                <!-- /.box-header -->
              <div class="modal-body" style="color:#9e9e9e !important;">
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
                  
                   <br><br>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                  
                    <button type="submit" class="btn btn-primary" style="background-color: #4285f4 !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                  <a href="{{route('messages.inbox')}}" class="btn btn-default" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;"><i class="fa fa-times"></i> Discard</a>
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