@extends('admin.site.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0 text-dark">Message</h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    @include('admin.error')
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Message / Inbox</a></li>
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
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12 bg-white">

                    <div class="card-body">
                        <a href="{{route('message.create')}}" class="btn btn-success btn-sm mt-3 mb-3">
                            <i class="fas fa-plus"></i> Add
                        </a>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Letter_NO</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Sender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                 @foreach ($mentions as $mention)
                                <tr>
                                    <td>@php echo $i;$i++; @endphp</td>
                                    <td>{{$mention->message->message_no}}</td>
                                    <td>{{$mention->message->date}}</td>
                                    <td>{{$mention->message->title}}</td>
                                    <td>{{Str::limit($mention->message->description,100)}}</td>
                                    <td>

                                          <button class="btn btn-dark btn-sm">
                                            {{$mention->message->user->name}}
                                          </button>
                                    </td>
                                    <td>
                                        <a href="{{Route('message.show',$mention->message->id)}}"><button class="btn btn-info btn-sm">Detail</button></a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
