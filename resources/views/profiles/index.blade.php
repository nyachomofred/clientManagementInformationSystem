@extends('layouts.master')
@section('content')
 <!-- Main content -->
 <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(!empty($user))
            <form class="form-horizontal" method="POST" action="{{route('profiles.update')}}">
            @csrf
              <div class="box-body">

                <div class="form-group" style="display:none">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id" value="{{$user->id}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Emaill Address</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="role" readonly=true value="{{$user->role}}">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
            @else
            <p>Could not find this record</p>
            @endif
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection