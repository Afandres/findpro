<aside class="main-sidebar sidebar-dark-red elevation-4">
    <!-- Brand Logo -->
    <div class="d-flex align-content-center">
        <a href="index3.html" class="brand-link text-center">
            <span class="brand-text font-weight-bold">Find Pro</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Find Pro User</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.company.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Compañia
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.sector.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-landmark-flag"></i>
                        <p>
                            Sector
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Categoria
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-bag-shopping"></i>
                        <p>
                            Producto
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-truck-ramp-box"></i>
                        <p>
                            Inventario
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
