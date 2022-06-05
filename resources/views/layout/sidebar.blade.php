    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/home') }}" class="brand-link">
            <img src="{{ asset('style/img/sayur-buah.jpg') }}" alt="VegeFruit Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">VegeFruit</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Home</p>
                </a>
            </li> 
            @can('isAdmin')
                <li class="nav-header">MASTER</li>                                                     
                <li class="nav-item">            
                    <li class="nav-item">
                        <a href="{{ url('/produk') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/pegawai') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/supplier') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Supplier</p>
                        </a>
                    </li>                
                </li>
                <li class="nav-header">TRANSAKSI</li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengeluaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian</p>
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penjualan</p>
                        </a>
                    </li> 
            @elsecan('isPelanggan')  
                <li class="nav-header">MENU</li>  
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Transaksi Baru</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Riwayat Transaksi</p>
                        </a>
                    </li>  
            @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>