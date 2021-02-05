@extends('admin.site.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Control</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User / Create</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-8 col-12 bg-white">

                    <div class="card m-5">
                        <div class="card-header bg-success">
                            <h3>Please Create New User</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{Route('user.store')}}" class="pt-2">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input type="text"  class="form-control" placeholder="Enter User Name"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email :</label>
                                    <input type="email" class="form-control" placeholder="Enter User Email"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label for="name">Password :</label>
                                    <input type="password" class="form-control" placeholder="Enter Password"
                                        name="password">
                                </div>
                                <div class="form-group">
                                    <label for="name">Confirm Password :</label>
                                    <input type="password" class="form-control" placeholder="Enter Confirm Password"
                                        name="password_confirmation">
                                </div>
                                <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                    <option value="#" class="bg-dark">Please Select One Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Postmen">Postmen</option>
                                    <option value="Super">Super</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('user.index')}}" class="btn btn-dark btn-sm mb-3">
                                        <i class="fas fa-reply"></i> Back
                                    </a>
                                    <button type="submit" class="btn btn-success btn-sm mb-3">
                                        <i class="fas fa-save"></i> Add
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>
                    @include('admin.error')
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
