<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <i class="nav-icon fas fa-ticket-alt"></i>&ensp;
        <span class="brand-text font-weight-light">E-Ticket</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">List Pesanan</li>
                <li class="nav-item">
                    <a href="{{ route('admin.pesanan') }}" class="nav-link active">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            List Pesanan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>