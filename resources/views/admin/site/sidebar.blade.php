<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('layouts/dist/img/asxox_icon.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Asxox</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('layouts/dist/img/user1-128x128.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('/dashboard') }}" class="d-block">{{Auth::User()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{url('/admin')}}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home text-warning"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

             @can('isAdmin')


                <li class="nav-item">

                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users text-warning"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
            @endcan
                <li class="nav-item">
                    <a href="{{route('message.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-plus-circle text-danger"></i>
                        <p>
                             Create Message
                        </p>
                    </a>
                </li>
                @can('isAdmin')
                <li class="nav-item">
                    <a href="{{route('message.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope text-info"></i>
                        <p>
                             System All Message
                        </p>
                    </a>
                </li>
                @elsecan('isPostmen')
                <li class="nav-item">
                    <a href="{{route('message.user',Auth::user()->id)}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope text-info"></i>
                        <p>
                             All Messages
                        </p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="{{route('message.inbox',Auth::user()->id)}}" class="nav-link">
                        <i class="nav-icon fas fa-inbox text-info"></i>
                        <p>
                            inbox message
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('message.sent',Auth::user()->id)}}" class="nav-link">
                        <i class="nav-icon fas fa-share-square text-primary"></i>
                        <p>
                            sent message
                        </p>
                    </a>
                </li>

                <hr>

                <li class="nav-item">
                    <a href="{{route('user.logout',Auth::user()->id)}}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            logout
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- End Main Sidebar Container -->
