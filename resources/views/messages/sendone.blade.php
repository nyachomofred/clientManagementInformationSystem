@extends('layouts.master')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

 <!-- Main content -->
 
 <style>
   
    
    table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #1d96b2;
     
}
   }

</style>

 <section class="content" style="background-color:white;">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-6">

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
            <div class="box-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
              <h3 class="box-title">
              
              Compose Message To : {{$client->firstname}} {{$client->lastname}}</h3>
            </div>
              <form class="form-horizontal" method="POST" action="{{route('messages.sendToOnePerson')}}">
                @csrf
                    <!-- /.box-header -->
                    @if(!empty($client))
                    <div class="box-body" style="color:#9e9e9e !important;">

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id" value="{{$client->id}}">
                            </div>
                        </div>

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Member No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="member_id" value="{{$client->member_id}}">
                            </div>
                        </div>
                                       
                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Client No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="client_no" value="{{$client->client_no}}">
                            </div>
                        </div>

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Firstname</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="firstname" value="{{$client->firstname}}">
                            </div>
                        </div>
                                       

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Middlename</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="middlename" value="{{$client->middlename}}">
                            </div>
                        </div>
                                       
                                        
                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Lastname</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="lastname" value="{{$client->lastname}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Confirm Phonenumber</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phonenumber" value="{{$client->phonenumber}}" required >
                            </div>
                        </div>

                                      

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Email Address</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="{{$client->email}}">
                            </div>
                        </div>

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Organisation</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="place_of_work" value="{{$client->place_of_work}}">
                            </div>
                        </div>

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Job Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="role" value="{{$client->role}}">
                            </div>
                        </div>

                                      

                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="location" value="{{$client->location}}">
                            </div>
                        </div>
                                        

                        <br> 
                        <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Membership Type</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="member_type" value="{{$client->member_type}}">
                            </div>
                        </div>

                        <br> 
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Subject</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="subject">
                            </div>
                        </div>

                            <br> <br>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Message</label>
                            <div class="col-sm-8">
                                <textarea name="message" class="form-control" required></textarea>
                            </div>
                        </div>
                         





                    </div>
                    @else
                    <p>Could not find this record</p>
                    @endif
                    
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-primary" style="background-color: #4285f4 !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;"><i class="fa fa-envelope-o"></i> Send</button>
                      </div>
                      <a href="{{route('clients.index')}}" class="btn btn-default" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;"><i class="fa fa-times" ></i> Discard/Go Back</a>
                    </div>
                </form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header">
             
              <div class="btn-group" role="group" aria-label="..." style="float:right;">
                  
                  <a href="{{url('/mails/send/'.$client->client_no)}}" class="btn btn-warning" ><i class="fa fa-envelope">Send Mail</i></a>
                  <a href="{{url('/messages/send/'.$client->client_no)}}" class="btn btn-info"><i class="fa fa-envelope">Send Message</i></a>
                  <a href="{{url('/invoices/InvoiceManagement/'.$client->client_no)}}" class="btn btn-primary"><i class="fa fa-envelope">Create Invoice</i></a>
                
                </div>
              
            </div>
              
                    <div class="box-body" style="color:#9e9e9e !important;">
                         @include('comunicationReport')

                    </div>
                    
                    
                    <!-- /.box-body -->
                    
               
            <!-- /.box-footer -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
      
      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sent Messages</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                 <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                  <th style="width: 10px">#</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Date Sent</th>
                  <th>Status</th>
                  <th>Date Received</th>
                </tr>
               @if(!empty($messages))
                @foreach($messages as $key=>$message)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td>{{$message->day}}/{{$message->month}}/{{$message->year}} : {{$message->dayTime}}</td>
                    <td><span class="badge bg-green">Received</span></td>
                    <td>{{$message->day}}/{{$message->month}}/{{$message->year}} : {{$message->dayTime}}</td>

                </tr>
                @endforeach
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