<!--begin::Sidebar Brand-->
<div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
        <!--begin::Brand Image-->
        <img src="{{ asset('admin/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image opacity-75 shadow" />
        <!--end::Brand Image-->

        <!--begin::Brand Text-->
        <span class="brand-text fw-light">Admin</span>
        <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
</div>
<!--end::Sidebar Brand-->

<!--begin::Sidebar Wrapper-->
<div class="sidebar-wrapper">

    <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
            aria-label="Main navigation" data-accordion="false" id="navigation">

            <!-- Category -->
            @if (auth()->user()->role == 'admin')
                <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Category
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/owner/category-list') }}" class="nav-link active">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/owner/category-create') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        SubCategory
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/owner/subcategory-list') }}" class="nav-link active">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/owner/subcategory-create') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Product
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/owner/product-list') }}" class="nav-link active">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/owner/product-create') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Product Review
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/owner/review-list') }}" class="nav-link active">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/owner/review-create') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Orders
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/owner/orders/all')}}" class="nav-link active">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>All Orders</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/owner/orders/pending') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Pending Orders</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ url('/owner/orders/cancelled') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Cancelled Orders</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ url('/owner/orders/confirmed') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Confirmed Orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/owner/orders/delivered') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Delivered Orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/owner/orders/returened') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Returned Orders</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="{{ url('/owner/contact-messages') }}" class="nav-link">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <p>Contact Message</p>
                </a>
            </li>

            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        General Settings
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/owner/website-settings') }}" class="nav-link active">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Website Setting</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/owner/website-policy') }}" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Policy Setting</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <a href="{{ url('/admin/logout') }}" class="nav-link">
                    <i class="nav-icon bi bi-box-arrow-right"></i>
                    <p>Logout</p>
                </a>
            </li>

        </ul>
        <!--end::Sidebar Menu-->
    </nav>

</div>
<!--end::Sidebar Wrapper-->
