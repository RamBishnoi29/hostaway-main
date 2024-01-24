@section('sidemenu')
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('admin/images/Houzlet-Logo2.png') }}" width="120" />
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-comment-alt"></i>
                <span>Messages</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-building"></i>
                <span>Rentals</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Create Rentals</span>
                    </a>

                    <a class="collapse-item" href="#">
                        <i class="fas fa-fw fa-list"></i>
                        <span>My Applications</span>
                    </a>

                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}" data-toggle="collapse"
                data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wallet"></i>
                <span>Wallet</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('dashboard') }}">
                        <i class="fas fa-money-check"></i>
                        <span>Payment Method</span>
                    </a>

                    <a class="collapse-item" href="{{ route('dashboard') }}">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Earnings</span>
                    </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-list"></i>
                <span>Listings</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/mylisting">
                        <i class="fas fa-fw fa-list"></i>
                        <span>My Listings</span>
                    </a>

                    <a class="collapse-item" href="/addlisting">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Add New Listing</span>
                    </a>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#HostawayPages"
                aria-expanded="true" aria-controls="HostawayPages">
                <i class="fas fa-fw fa-list"></i>
                <span>Hostaway</span>
            </a>
            <div id="HostawayPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/addPropertyTypes">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Add Property Type</span>
                    </a>

                    <a class="collapse-item" href="/addbedtype">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Add Bed Type</span>
                    </a>
                    <a class="collapse-item" href="/addamenities">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Add Amenities</span>
                    </a>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#HostawayListingPages"
                aria-expanded="true" aria-controls="HostawayListingPages">
                <i class="fas fa-fw fa-list"></i>
                <span>Hostaway Listing</span>
            </a>
            <div id="HostawayListingPages" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/addHostawayListing">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Add Listing</span>
                    </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-heart"></i>
                <span>Favorites</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Owners</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('auth.logout') }}">
                <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                <span>Log Out</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
@endsection
