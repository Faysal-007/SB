<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('public_home')}}" class="brand-link">
        <img src="{{ asset('admin/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">My School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="avatar/{{Auth::user()->profile_info->avatar}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div> --}}



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="#" class="nav-link">
                    <img class= "img-circle" src="avatar/{{Auth::user()->profile_info->avatar ?? ''}}" alt="" style="width: 35px;height:35px">
                    <p class="pl-1">
                        {{ Auth::user()->name }}
                        <i class="right fas fa-angle-left pt-1"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('user_profile')}}" class="nav-link">
                            <i class="far fa-user nav-icon"></i>
                            <p>My Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:{}" class="nav-link"
                            onclick="document.getElementById('logout').submit();">
                            <form style="padding:0" id="logout" method="post" action="{{ route('logout') }}">
                                @csrf
                                <i class="far fa-user nav-icon"></i>
                                <p>Logout</p>
                            </form>
                        </a>

                    </li>
                </ul>
            </li> 
               <li class="nav-item">
                    <a href="{{route('admin_dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('list_blog')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Blogs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('list_blog_category')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Blog Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all_user_list')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('role_list')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Roles
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('list_class')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Class
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('list_subject')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Subject
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('list_assign_subject')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Assign Subject
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                        </p>
                    </a>
                </li>


                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
