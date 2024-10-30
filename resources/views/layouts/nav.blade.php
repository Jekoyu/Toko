<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{env('STORE_NAME')}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Barang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('distributor.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Distributor</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>