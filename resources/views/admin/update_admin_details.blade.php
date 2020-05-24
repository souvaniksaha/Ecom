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
                <div class="row" style="margin-left: 5in;">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Admin Details</h3>
                            </div>

                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                                    <strong> {{Session::get('success')}} </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        @endif
                            @if($errors->any())
                                <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
                                    @foreach ($errors->all() as $item)
                                        {{$item}}
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                             @endif
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{url('admin/update-admin-details')}}" id="updatePasswordForm">
                                @csrf
                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$adminDetails->name}}" name="admin_name" id="admin_name">
                                      </div> --}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Email</label>
                                        <input type="text" class="form-control" readonly="" value="{{ Auth::guard('admin')->user()->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Name</label>
                                        <input type="text" class="form-control"  value="{{ Auth::guard('admin')->user()->name }}" name="admin_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Type</label>
                                        <input type="text" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->type }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile" value="{{Auth::guard('admin')->user()->mobile }}" name="mobile" >

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image</label>
                                        <input type="file" class="form-control" id="admin_image"  name="admin_image" required>
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
