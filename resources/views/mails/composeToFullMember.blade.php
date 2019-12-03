@extends('layouts.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<?php
$totalclients=count(DB::table('clients')->where(['member_type'=>'Fullmember'])->get());
$clients=DB::table('clients')->where(['member_type'=>'Fullmember'])->get();
?>
 <!-- Main content -->
 <section class="content">
      <div class="row">
       
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
              <h3 class="box-title"> <a href="{{route('mails.index')}}"> <i class="fa fa-backward"></i>Go Back</a> &nbsp; &nbsp; This email shall be received by [{{$totalclients}}] Full members  <a type="button" class="btn btn-link" data-toggle="modal" data-target=".bd-example-modal-lg">View recipients</a> </h3>
            </div>
                <form method="POST" action="{{route('mails.composeToFullMemberCreate')}}" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                    <!-- /.box-header -->
                    <div class="box-body">
                    <div class="form-group">
                          <label class="col-sm-2 control-label">Subject</label>
                          <div class="col-sm-10">
                            <input class="form-control" placeholder="Subject:" name="subject">
                          </div>
                      </div>

                     <br>

                      <div class="form-group">
                              <label class="col-sm-2 control-label">Message</label>
                              <div class="col-sm-10">
                                  <textarea id="editor1" class="form-control"  name="message"> </textarea>
                              </div>
                      </div>
                      <br>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Attachment</label>
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
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                      </div>
                      <a href="{{route('mails.index')}}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                    </div>
                </form>
            <!-- /.box-footer -->



            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                   

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phonenumber</th>
                            <th scope="col">Member Type</th>
                            <th scope="col">City</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($clients))
                          @foreach($clients as $key=>$record)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$record->firstname}} {{$record->lastname}}</td>
                                <td>{{$record->email}}</td>
                                <td>{{$record->phonenumber}}</td>
                                <td>{{$record->member_type}}</td>
                                <td>{{$record->location}}</td>
                               
                            </tr>
                          @endforeach
                        @endif   
                        </tbody>
                        </table>


                    </div>
                </div>
            </div>



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