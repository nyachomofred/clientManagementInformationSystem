@extends('layouts.master')
@section('content')



<section class="content">
    <div class="row">
       <div class="box">
          <div class="box-header"></div>
          <div class="row">

            <div class="col-sm-1"></div>
             <div class="col-sm-10">
                    <div class="box">
                        <div class="box-header">Company Profile
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="float:right;"><i class="fa fa-user-plus"> Update Company Profile </i></button>
                        </div>
                       @if(!empty($data))
                       <table class="table" style="width:100%">
                            <tr>
                                <td>
                                
                                <img src="{{asset('image/'.$data->companyLogo)}}" class="img-circle" style="width:60%"><br>
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#modal-logo"> Update Company Logo </a>
                                
                                </td>
                                <td>
                                    <table class="table table-striped" style="height:300px;">
                                        <tr>
                                            <td>Compamny Name</td>
                                            <td>{{$data->companyName}}</td>
                                        </tr>

                                        <tr>
                                            <td>Telephone Number</td>
                                            <td>{{$data->companyTelNo}}</td>
                                        </tr>


                                        <tr>
                                            <td>Company Email</td>
                                            <td>{{$data->companyEmail}}</td>
                                        </tr>

                                        <tr>
                                            <td>Company Website</td>
                                            <td>{{$data->companyWebsiteLink}}</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                       @endif
                    </div>



                <div class="modal fade" id="modal-logo">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Update Company Logo</h4>


                            </div>
                        @if(!empty($data))
                        <form class="form-horizontal" method="POST" action="{{route('signatures.updatelogo')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                            

                                <div class="form-group" style="display:none;">
                                    <label class="col-sm-4 control-label">ID </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="id"  value="{{$data->id}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Attach New Logo Image </label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="companyLogo" required>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        @endif
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                
                </div>


             <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add New Member/Client</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    @if(!empty($data))
                     <form class="form-horizontal" method="POST" action="{{route('signatures.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                           

                            <div class="form-group" style="display:none;">
                                <label class="col-sm-4 control-label">ID </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id"  value="{{$data->id}}">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Name </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyName" value="{{$data->companyName}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">company Telephone No</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyTelNo"  value="{{$data->companyTelNo}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Email Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyEmail" value="{{$data->companyEmail}}">
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Website Link</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyWebsiteLink"  value="{{$data->companyWebsiteLink}}">
                                </div>
                            </div>

                           

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                     </form>
                    @endif
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>


             
             </div>

             <div class="col-sm-1"></div>
          </div>
       </div>
    </div>
     
</section>
    <!-- /.content -->

@endsection