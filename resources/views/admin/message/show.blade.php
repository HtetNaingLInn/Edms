@extends('admin.site.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0 text-dark">Message</h1>
                    <a href="{{route('message.index')}}" class="btn btn-primary btn-sm mt-3 mb-3">
                        <i class="fas fa-arrow-circle-left"></i>&nbsp; Back
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    @include('admin.error')
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Message / Detail</a></li>
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

                <div class="col-lg-8 offset-2 col-md-12 col-12 bg-white">

                    <div class="card-body">

                    <h5 class="float-right"> Date : {{$message->date}}  </h5>

                    <p class="text-bold">Letter_NO : {{$message->message_no}}</p>
                    <p class="text-bold">Sender Name : &nbsp;{{$message->user->name}}</p>
                        <hr>
                        <br>
                    <h5 class="text-bold">Title : &nbsp;{{$message->title}}</h5>
                    <hr>
                    <h4 class="text-center text-bold">Description</h4>
                    <p class="text-center">{{$message->description}}</p>
                        <hr>
                        <p>Attach Files</p>

                        @if ($message->message_attach)


                        @foreach ($message->message_attach as $files)
                            {{-- <i>{{$files->file}}</i><br> --}}


                            <img src="{{asset('attach/'.$files->file)}}"
                                            style="width:50px !important;">
                        @endforeach


                        @endif
                        <hr>
                        <br>
                        <br>
                        <p class="text-bold">Reciver</p>
                                @foreach ($message->copy_message as $message)
                                <p class="text-bold">
                                {{$message->user->name}}
                                </p>
                            @endforeach
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
