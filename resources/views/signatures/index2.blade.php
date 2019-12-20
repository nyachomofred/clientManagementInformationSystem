@extends('layouts.master')
@section('content')



<section class="content">
    <div class="row">
       <div class="box">
          <div class="box-header"></div>
          <div class="row">
             <div class="col-sm-8">
                    <div class="box">
                     <div class="box-header">Company Profile</div>
                       @if(!empty($data))
                       <table class="table" style="width:100%">
                            <tr>
                                <td><img src="{{asset('image/'.$data->companyLogo)}}" class="img-circle" style="width:70%"></td>
                                <td>
                                    <table class="table">
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
             
             </div>
             <div classs="col-sm-4"></div>
          </div>
       </div>
    </div>
     
</section>
    <!-- /.content -->

@endsection














<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="float:right;"><i class="fa fa-user-plus"> Add New Client </i></button>



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
                    <form class="form-horizontal" method="POST" action="{{route('signatures.insert')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                           

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Clouser </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="clouser"  value="{{old('clouser')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Name </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyName" value="{{old('comapnyName')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">company Telephone No</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyTelNo"  value="{{old('companyTelNo')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Email Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyEmail" value="{{old('comapnyEmail')}}">
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Website Link</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="companyWebsiteLink"  value="{{old('companyWebsiteLink')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Signature Logo</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="signatureLogo" value="{{old('signatureLogo')}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Logo</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="companyLogo" value="{{old('companyLogo')}}">
                                </div>
                            </div>

                           

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                     </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>