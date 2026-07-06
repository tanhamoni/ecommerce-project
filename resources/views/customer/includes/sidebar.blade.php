<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ url('/customer/dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="sidebar-brand-text mx-2">
            Customer
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ Request::is('customer/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/customer/dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Order -->
    <li class="nav-item">
        <a class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#orderMenu">
            <i class="fas fa-shopping-cart"></i>
            <span>Order</span>
        </a>

        <div id="orderMenu" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/customer/orders/all') }}">
                    All Order
                </a>
            </div>
             <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/customer/orders/pending') }}">
                    Pending Order
                </a>
            </div>
             <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/customer/orders/confirmd') }}">
                    Confirmd Order
                </a>
            </div>
             <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/customer/orders/delivered') }}">
                    Delivered Order
                </a>
            </div>
             <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/customer/orders/returned') }}">
                    Returned Order
                </a>
            </div>
             <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/customer/orders/cancelled') }}">
                    Cancelled Order
                </a>
            </div>
        </div>
    </li>

</ul>
<!-- End Sidebar -->