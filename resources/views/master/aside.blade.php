<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm4vwkkVo7fvT0vGHZ3P4wdBF_wLsLORSZWg&s" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SIP3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/545/335/small/user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/major" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Kelola Jurusan 

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/class" class="nav-link">
                        <i class="nav-icon fa-solid fa-people-group"></i>
                        {{-- <i class=""></i> --}}
                        <p>
                            Kelola Kelas 

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/violation" class="nav-link">
                        <i class="nav-icon fa-solid fa-circle-exclamation"></i>
                        <p>
                            Kelola Pelanggaran 

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/student" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        
                        <p>
                            Kelola Siswa 

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-tie"></i>
                        
                        <p>
                            Kelola Osis
                        </p>
                    </a>
                </li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li class="nav-item">
                        <button type="submit" class="nav-link">
                            {{ __('Log Out') }}
                        </button>
                           
                            
                          
                    </li>
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
