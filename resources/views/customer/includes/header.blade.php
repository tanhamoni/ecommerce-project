<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Center Title -->
    <div class="mx-auto ml-5 d-none d-md-block">
        <h4 class="mb-0 font-weight-bold text-primary">
            <i class="fas fa-tachometer-alt mr-2"></i>
            Customer Dashboard
        </h4>
    </div>

    <!-- Right Navbar -->
    <ul class="navbar-nav ml-auto">

        @php
            $authUserImage = Auth::user()->image;
        @endphp

        <!-- User Dropdown -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">

                @if ($authUserImage != null)
                    <img class="img-profile rounded-circle" src="{{ $authUserImage }}">
                @else
                    <img class="img-profile rounded-circle" src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
                @endif

            </a>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

                <a class="dropdown-item" href="{{ url('/customer/profile-view') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <a class="dropdown-item" href="{{ url('/customer/view-credentials') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Credential Settings
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ url('/customer/logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>

            </div>

        </li>

    </ul>

</nav>
<!-- End Topbar -->
