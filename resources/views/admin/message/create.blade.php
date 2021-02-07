@extends('admin.site.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Message</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Message / Create</a></li>
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


                        <div class="col-md-8 offset-2 mt-3">
                            @include('admin.error')
                        </div>
                    <div class="card m-5">
                        <div class="card-header">
                            <h5 class="text-success">Create A New Letter</h5>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{Route('message.store')}}" class="pt-2" enctype="multipart/form-data">
                                @csrf



                                <div class="form-group">
                                    <label for="name">Letter_NO :</label>
                                    <input type="text"  class="form-control" placeholder="Enter Letter Number"
                                        name="message_no">
                                </div>
                                <div class="form-group">
                                    <label for="name">Date :</label>
                                    <input type="date"  class="form-control"
                                        name="date">
                                </div>
                                <div class="form-group">
                                    <label for="name">Title :</label>
                                    <input type="text"  class="form-control" placeholder="Enter Letter Title"
                                        name="title">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
                                  </div>

                                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                                  <div class="form-group">
                                    <label for="File1">Choose files :</label>
                                    <input type="file" class="form-control-file rounded" id="File1" name="file[]"
                                        style="border:1px solid black;" multiple>
                                </div>

                                <select class="form-control" id="user" name="users[]" multiple>

                                    @foreach ($users as $user)
                                        @if ($user->id === Auth::user()->id)
                                        <option value="{{$user->id}}" disabled >{{$user->name}}</option>
                                        @else
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endif
                                    @endforeach
                                  </select>


                                <div class="form-group mt-3">
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
<script>

</script>
@endsection
