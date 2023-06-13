<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">Art Space</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'dashboards') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboards">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    
    @if(Auth::user()->role == 'admin')

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'products') ? 'active' : '' }}">
        <a class="nav-link" href="/products">
            <i class="fa fa-camera-retro" aria-hidden="true"></i>
            <span>Produk</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'models') ? 'active' : '' }}">
        <a class="nav-link" href="/models">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Model</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'clients') ? 'active' : '' }}">
        <a class="nav-link" href="/clients">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Client</span></a>
    </li>
    
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'orders') ? 'active' : '' }}">
        <a class="nav-link" href="/orders">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
            <span>Order</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->segment(1) == 'hpp') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
            <i class="fa fa-book"></i>
            <span>Report</span>
        </a>
        <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Report Components:</h6>
                <a class="collapse-item" href="/hpp">HPP</a>
                <a class="collapse-item" href="/periode-hpp">Periode HPP</a>
                <a class="collapse-item" href="/report-customer">Customer</a>
            </div>
        </div>
    </li>
    @elseif (Auth::user()->role == 'client')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'orders') ? 'active' : '' }}">
        <a class="nav-link" href="/orders">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span>Order</span></a>
    </li>
    <li class="nav-item {{ (request()->segment(1) == 'myorders') ? 'active' : '' }}">
        <a class="nav-link" href="/myorders">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            <span>My Order</span></a>
    </li>
    @endif


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->