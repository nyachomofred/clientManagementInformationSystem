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
          <h3 class="box-title">Quick Review</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
           <div class="row">
              
              <div class="col-sm-12">

                  <div class="col-sm-3">
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
                      <div class="col-sm-3">
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


               <!-- ./col -->
              <div class="col-sm-3">
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
              <div class="col-sm-3">
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


           <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Registration Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    @include('google_pie_chart')
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                
              </div>
              <!-- /.row -->
            </div>
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

           
        </div>
        
      </div>
     

    </section>
    <!-- /.content -->
@endsection
