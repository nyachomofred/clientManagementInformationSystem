@extends('layouts.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-8">

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
              <h3 class="box-title">
              <a href="{{route('clients.index')}}"><i class="fa fa-backward"></i></a>
              Compose Email To : {{$client->firstname}} {{$client->lastname}}</h3>
            </div>
                <form method="POST" action="{{route('mails.insertone')}}" enctype="multipart/form-data">
                @csrf
                    <!-- /.box-header -->
                    <div class="box-body">

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Confirm Email Address</label>

                        <div class="col-sm-10" > 
                            <select  class="form-control"  style="width: 100%;" name="email[]" readonly> 
                            @if(!empty($client))
                            <option value="{{$client->email}}">{{$client->email}}</option>
                            @endif
                            </select>
                        </div>
                      </div>

                <br><br>
                      <div class="form-group">
                        <label  class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10"> 
                           <input class="form-control" placeholder="Subject:" name="subject">
                        </div>
                      </div>

                      
                      <br><br>
                      <div class="form-group">
                       <label  class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10"> 
                            <textarea  class="form-control" id="editor1" style="height: 300px" name="message" rows="3">
                              
                            </textarea>
                        </div>
                      </div>

                      <br><br>
                    <div class="form-group">
                    <label  class="col-sm-2 control-label">Attachment</label>
                        <div class="col-sm-10"> 
                            <div class="input-group control-group increment" >
                                <input type="file" name="a_file[]" class="form-control" multiple>
                                <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            </div>
                            <div class="clone hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="a_file[]" class="form-control" multiple>
                                <div class="input-group-btn"> 
                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    </div>
                    
                    <br><br>
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
      <div class="row">
      
      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Received Mails</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Date Sent</th>
                  <th>Status</th>
                  <th>Date Received</th>
                </tr>
                @if(!empty($mails))
                @foreach($mails as $key=>$mail)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$mail->subject}}</td>
                  <td><?php echo $mail->message ?></td>
                  <td>{{$mail->day}}/{{$mail->month}}/{{$mail->year}}: {{$mail->dayTime}}</td>
                  <td><span class="badge bg-green">Received</span></td>
                  <td>{{$mail->day}}/{{$mail->month}}/{{$mail->year}}: {{$mail->dayTime}}</td>
                </tr>
                @endforeach
                @else
                  <p>No Record</p>
               @endif
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
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