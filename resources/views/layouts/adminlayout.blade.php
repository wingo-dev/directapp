<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Directory Admin Dashboard</title>
    <meta name="description" content="admin directory dashboard" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- vector map CSS -->
    <link href="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="{{ asset('vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><i
                    class="ion ion-ios-menu"></i></a>
            <a class="navbar-brand" href="/" target="_blank">
                <img class="brand-img d-inline-block mr-5" src="{{ asset('dist/img/logo.png') }}" style="width:50%;"
                    alt="directory" />
            </a>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item">
                    <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><i
                            class="ion ion-ios-settings"></i></a>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{ asset('dist/img/avatar10.jpg') }}" alt="user"
                                        class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="dropdown-icon zmdi zmdi-power"></i>
                            <span>Log out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                        data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{ Request::is('admin/setting*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.setting') }}">
                                <i class="ion ion-ios-person-add"></i>
                                <span class="nav-link-text">Setting</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/home*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.home') }}">
                                <i class="ion ion-ios-person-add"></i>
                                <span class="nav-link-text">Add Site Owner</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/home*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.view.siteowners') }}">
                                <i class="ion ion-ios-person-add"></i>
                                <span class="nav-link-text">Site Owners Management</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/view-customers*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.view.customers') }}">
                                <i class="ion ion-ios-person-add"></i>
                                <span class="nav-link-text">People Management </span>
                            </a>
                        </li>
                    </ul>
                    <div class="nav-header">
                        <span>Directory</span>
                        <span>GS</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{ Request::is('admin/view-category*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.category') }}">
                                <i class="ion ion-ios-book"></i>
                                <span class="nav-link-text">Categories</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/view-listings-management*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.listings.management') }}">
                                <i class="ion ion-ios-book"></i>
                                <span class="nav-link-text">Listings Management</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/view-pending-listings*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('view.pending') }}">
                                <i class="ion ion-ios-book"></i>
                                <span class="nav-link-text">Pending Listings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            @yield('content')
            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>© Gate City Bar Association | Powered by<a href="https://articdesigns.com/"
                                    class="text-dark" target="_blank">articdesign.com |
                                    <a href="{{ route('login') }}">Admin Login </a> |<a href=""> Submit Listing </a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('dist/js/toggle-data.js') }}"></script>

    <!-- Counter Animation JavaScript -->
    <script src="{{ asset('vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- Vector Maps JavaScript -->
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dist/js/vectormap-data.js') }}"></script>

    <!-- Owl JavaScript -->
    <script src="{{ asset('vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>


    <!-- Init JavaScript -->
    {{-- <script src="{{ asset('dist/js/init.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/dashboard-data.js') }}"></script> --}}

</body>

</html>
