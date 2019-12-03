@extends('layouts.master')
@section('content')
<?php 
 $clients=count(DB::table('clients')->get());
 $sentsms=count(DB::table('sms')->get());
 $mails=count(DB::table('mails')->get());
 $users=count(DB::table('users')->get());
?>
  <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
               <div class="col-sm-6">
                 <img src="{{asset('image/userlaptop.svg')}}" style="width:180px;">
               </div>

               <div class="col-sm-6">

            <!-- ./col -->
                <div class="col-sm-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{$mails}}</h3>

                      <p>Inbox [Mails]</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('mails.sent')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            <!-- ./col -->

            <!-- ./col -->
              <div class="col-sm-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>System Users</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <!-- ./col -->

</div>

           </div>
          <div class="row">
              <div class="col-sm-6">
                 <table class="table table-striped table-bordered">
                    <tr>
                        <td>Firstname</td>
                        @guest
                        @else
                           <td>{{Auth::user()->firstname}}</td>
                        @endguest
                       
                    </tr>
                    <tr>
                       <td>Lastname</td>
                        @guest
                        @else
                           <td>{{Auth::user()->lastname}}</td>
                        @endguest
                    </tr>

                    <tr>
                       <td>Email Address</td>
                        @guest
                        @else
                           <td>{{Auth::user()->email}}</td>
                        @endguest
                    </tr>

                    <tr>
                       <td>Role</td>
                        @guest
                        @else
                           <td>{{Auth::user()->role}}</td>
                        @endguest
                    </tr>

                    <tr>
                       <td>Action</td>
                        
                           <td><a href="{{route('profiles.index')}}">Update Profile</a></td>
                       
                    </tr>
                   
                 </table>
              </div>
              <div class="col-sm-6">

                  <div class="col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>{{$clients}}</h3>
                        <p>Clients/Members</p>
                      </div>
                      <div class="icon">
                      <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{route('clients.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>


                  <!-- ./col -->
                      <div class="col-sm-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>{{$sentsms}}</h3>

                            <p>Inbox[Messages]</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="{{route('messages.inbox')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                  <!-- ./col -->

                 
              </div>
           </div>
           
        </div>
        
      </div>
     

    </section>
    <!-- /.content -->
@endsection
