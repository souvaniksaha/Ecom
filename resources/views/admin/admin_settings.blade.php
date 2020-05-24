@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Password</h3>
                </div>

                @if(Session::has('error'))
                    <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
                      <strong> {{Session::get('error')}} </strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                @endif
                
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                  <strong> {{Session::get('success')}} </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif 
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{url('admin/update-current-pwd')}}" id="updatePasswordForm">
                  @csrf
                  <div class="card-body">
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Admin Name</label>
                        <input type="text" class="form-control" name="name" value="{{$adminDetails->name}}" name="admin_name" id="admin_name">
                      </div> --}}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Admin Email</label>
                      <input type="text" class="form-control" readonly="" value="{{$adminDetails->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Admin Type</label>
                        <input type="text" class="form-control" readonly="" value="{{$adminDetails->type}}">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Current Password</label>
                      <input type="password" class="form-control" id="current_pw" placeholder="Enter Password" name="current_pw" required>
                      <span id="checkCurrentPassword"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="new_pw" placeholder="Enter New Password" name="new_pw" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_pw" name="confirm_pw" placeholder="Enter Confirm Password" required>
                      </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
