@extends('layouts.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<?php
$clients=DB::table('clients')->get();
?>
 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('mails.sent')}}" class="btn btn-primary btn-block margin-bottom">Back to Sent Mails</a>

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
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
                <form method="POST" action="{{route('mails.insert')}}" enctype="multipart/form-data">
                @csrf
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="form-group">
                       

                        <select class="form-control select2"  data-placeholder="To" style="width: 100%;" name="name" required> 
                         <option value="">To</option>
                        @if(!empty($clients))
                          @foreach($clients as $client)
                          <option value="{{$client->email}}">{{$client->firstname}} {{$client->lastname}} [{{$client->email}}]->{{$client->member_type}}</option>
                          @endforeach
                        @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Subject:" name="subject">
                      </div>

                      <div class="form-group">
                        <select class="form-control select2" multiple="multiple" data-placeholder="Cc" style="width: 100%;" name="MultipleValues[]"> 
                        @if(!empty($clients))
                          @foreach($clients as $client)
                          <option value="{{$client->email}}">{{$client->firstname}} {{$client->lastname}}</option>
                          @endforeach
                        @endif
                        </select>

                      </div>

                      <div class="form-group">
                            <textarea id="compose-textarea" class="form-control" style="height: 300px" name="message">
                              
                            </textarea>
                      </div>
                      <div class="form-group">
                          <div class="input-group control-group increment" >
                            <input type="file" name="images[]" class="form-control" multiple>
                            <div class="input-group-btn"> 
                              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                          </div>
                          <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="file" name="images[]" class="form-control" multiple>
                              <div class="input-group-btn"> 
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                              </div>
                            </div>
                          </div>


                       </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                      </div>
                      <a href="{{route('mails.index')}}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
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

    <script type="text/javascript">
        $(document).ready(function() {

          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });

          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });

        });
</script>
    <!-- /.content -->
@endsection