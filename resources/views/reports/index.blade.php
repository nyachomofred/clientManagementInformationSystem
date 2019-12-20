@extends('layouts.master')
@section('content')


<?php
  $mails=DB::table('ccmails')->get();
?>

    <!-- Main content -->
    <section class="content" style="background-color:white;">
      <div class="row">
          
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Membership and their type</h3>

                  <div class="btn-group" role="group" aria-label="..." style="float:right;">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#practicing" style=""><i class="fa fa-user-plus">Practicing Members </i></button>
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#fullmember" style=""><i class="fa fa-user-plus">Full Members </i></button>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#associate" style=""><i class="fa fa-user-plus"> Associate Members </i></button>
                      
                
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
             
             
             @include('google_pie_chart')
             <?php
              $practicing=DB::table('clients')->where(['member_type'=>'Practicing'])->get();
              $fullmember=DB::table('clients')->where(['member_type'=>'Fullmember'])->get();
              $associate=DB::table('clients')->where(['member_type'=>'Associate'])->get();
             ?>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="practicing">
             <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">PRACTICING MEMBERS</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Member No</th>
                                        <th>Name</th>
                                        <th>Membership Type</th>
                                        <th>Email</th>
                                        <th>Phonenumber</th>
                                        <th>City</th>
                                        <th>Organisation</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($practicing))
                                        @foreach($practicing as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->member_id}}</td>
                                            <td>{{$record->firstname}} {{$record->lastname}}</td>
                                            <td>{{$record->member_type}}</td>
                                            <td>{{$record->email}}</td>
                                            <td>{{$record->phonenumber}}</td>
                                            <td>{{$record->location}}</td>                          
                                            <td>{{$record->place_of_work}}</td>
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            
            
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="fullmember">
             <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">FULL MEMBERS</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Member No</th>
                                        <th>Name</th>
                                        <th>Membership Type</th>
                                        <th>Email</th>
                                        <th>Phonenumber</th>
                                        <th>City</th>
                                        <th>Organisation</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($fullmember))
                                        @foreach($fullmember as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->member_id}}</td>
                                            <td>{{$record->firstname}} {{$record->lastname}}</td>
                                            <td>{{$record->member_type}}</td>
                                            <td>{{$record->email}}</td>
                                            <td>{{$record->phonenumber}}</td>
                                            <td>{{$record->location}}</td>                          
                                            <td>{{$record->place_of_work}}</td>
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
                        
                        
            
            
            
            
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="associate">
             <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Associate Members</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Member No</th>
                                        <th>Name</th>
                                        <th>Membership Type</th>
                                        <th>Email</th>
                                        <th>Phonenumber</th>
                                        <th>City</th>
                                        <th>Organisation</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($associate))
                                        @foreach($associate as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->member_id}}</td>
                                            <td>{{$record->firstname}} {{$record->lastname}}</td>
                                            <td>{{$record->member_type}}</td>
                                            <td>{{$record->email}}</td>
                                            <td>{{$record->phonenumber}}</td>
                                            <td>{{$record->location}}</td>                          
                                            <td>{{$record->place_of_work}}</td>
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
                        
                        
                        
                                    
                        
             
             
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
        
      </div>
      
      
       <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Processed and Failed Invoices</h3>
              
              <div class="btn-group" role="group" aria-label="..." style="float:right;">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#totalinvoice" style=""><i class="fa fa-file">Total Invoices </i></button>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#processed" style=""><i class="fa fa-file">Proccessed Invoices </i></button>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#failed" style=""><i class="fa fa-file"> Failed Invoices </i></button>
              
             </div>
                  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <?php
                   $invoice=DB::table('invoices')->get();
                   
                 ?>
             
             @include('invoiceReport')
                
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="totalinvoice">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Total Invoice</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Invoice No</th>
                                        <th>Invoive Name</th>
                                        <th>Invoice V.A.T</th>
                                        <th>Date Created</th>
                                        <th>Due Date</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($invoice))
                                        @foreach($invoice as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->invoice_no}}</td>
                                            <td>{{$record->invoice_name}}</td>
                                           
                                            <td>{{$record->vat}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->dueData}}</td>                          
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            
            
            
            
            
            
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="processed">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Proccessed Invoice</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Invoice No</th>
                                        <th>Invoive Name</th>
                                        <th>Invoice V.A.T</th>
                                        <th>Date Created</th>
                                        <th>Due Date</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($invoice))
                                        @foreach($invoice as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->invoice_no}}</td>
                                            <td>{{$record->invoice_name}}</td>
                                           
                                            <td>{{$record->vat}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->dueData}}</td>                          
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            
            
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="failed">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Failed Invoices</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Invoice No</th>
                                        <th>Invoive Name</th>
                                        <th>Invoice V.A.T</th>
                                        <th>Date Created</th>
                                        <th>Due Date</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($invoices))
                                        @foreach($invoices as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->invoice_no}}</td>
                                            <td>{{$record->invoice_name}}</td>
                                           
                                            <td>{{$record->vat}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->dueData}}</td>                          
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            






            </div>
            <!-- /.box-body -->
            
          </div>
          
        </div>
        <!-- /.col -->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Proccessed And Failed SMS</h3>
              
              <div class="btn-group" role="group" aria-label="..." style="float:right;">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#totalmessages" style=""><i class="fa fa-file">Total Sms </i></button>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#sentmessages" style=""><i class="fa fa-file">Sent sms </i></button>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#failedmessages" style=""><i class="fa fa-file"> Failed Sms </i></button>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#totalmails" style="background-color:rgb(171, 71, 188);"><i class="fa fa-file"> Total Mails </i></button>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#sentmails" style=""><i class="fa fa-file"> Sent Mails </i></button>
             </div>
                  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php
                 $messages=DB::table('singlemessages')->get();
               ?>  
             
             @include('smsReport')
             
             
             
             
             
              
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="sentmessages">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Sent Messages</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date Sent</th>
                                        <th>Date Received</th>
                                        <th>Received By</th>
                                       
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($messages))
                                        @foreach($messages as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->subject}}</td>
                                            <td>{{$record->message}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->firstname}} {{$record->lastname}}-{{$record->phonenumber}}</td>                          
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            
            
            
            
            
            
              
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="totalmessages">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Total Processed Messages</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date Proccessde</th>
                                        <th>Date Sent</th>
                                        <th>Receiver</th>
                                       
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($messages))
                                        @foreach($messages as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->subject}}</td>
                                            <td>{{$record->message}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->firstname}} {{$record->lastname}}-{{$record->phonenumber}}</td>                          
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            
            
            
            
            
            
            
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="failedmessages">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Failed Messages</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date Proccessde</th>
                                        <th>Date Sent</th>
                                        <th>Receiver</th>
                                       
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($message))
                                        @foreach($message as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->subject}}</td>
                                            <td>{{$record->message}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->firstname}} {{$record->lastname}}-{{$record->phonenumber}}</td>                          
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            
            
            
            
            
            
            
             <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="totalmails">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Total Mail</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date Proccesed</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($mails))
                                        @foreach($mails as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->subject}}</td>
                                            <td><?php echo $record->message ?></td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                                                   
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            
            
            
            
            
            
            
            
            
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="sentmails">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #2bbbad !important;color:white;text-transform:uppercase;">
                           
                           <center> <h4 class="modal-title">Sent Mail</h4></center>
                            
                        </div>
                    
                        <div class="modal-body">
                            <table  class="table" style="border: 1px solid #1d96b2;" id="example1">
                                <thead>
                                    <tr style="background-color:rgb(29, 150, 178);color:white;border: 1px solid #1d96b2;">
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date Sent</th>
                                        <th>Date Received</th>
                                        <th>Receiver</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($mails))
                                        @foreach($mails as $key=>$record)
                                        <tr style="border: 1px solid #1d96b2;">
                                            <td>{{++$key}}</td>
                                            <td>{{$record->subject}}</td>
                                            <td><?php echo $record->message ?></td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->day}} / {{$record->month}} / {{$record->year}}</td>
                                            <td>{{$record->firstname}}  {{$record->lastname}} - {{$record->email}}</td>
                                                                   
                                          
                                           
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    
                           
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="background-color: #a6c !important;border-radius: .125rem;text-transform: uppercase;word-wrap: break-word;
                                        white-space: normal;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                                        padding: .84rem 2.14rem;
                                        font-size: 18px;color: #fff;">Close</button>
                           
                        </div>
                    
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            






            </div>
            <!-- /.box-body -->
            
          </div>
          
        </div>
        <!-- /.col -->
        
        
                
          
            <!-- /.box-body -->
            
          </div>
          
        </div>
      </div>
        <!-- /.col -->
      
        
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
@endsection