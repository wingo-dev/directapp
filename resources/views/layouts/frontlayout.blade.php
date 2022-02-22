<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Directory</title>
    <meta name="description" content="directory" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Lightgallery CSS -->
    <link href="{{ asset('dist/css/lightgallery.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dist/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="60">
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav hk-landing">
        <div class="bg-white shadow-sm">
            <div class="container px-0">
                <nav class="navbar navbar-expand-xl navbar-light hk-navbar hk-navbar-alt shadow-none">
                    <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);"
                        data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i
                                data-feather="menu"></i></span></a>
                    <a class="navbar-brand" href="/">
                        <img class="brand-img d-inline-block mr-5" src="{{ asset('dist/img/logo.png') }}"
                            alt="brand" />
                    </a>
                </nav>
            </div>
        </div>
        <div class="hk-pg-wrapper pt-0 px-0">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    @yield('content')
                </div>
            </div>
            <!-- Footer -->
            <div class="hk-footer-wrap container px-15">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>© Gate City Bar Association | Powered by<a href="https://articdesigns.com/"
                                    class="text-dark" target="_blank">articdesign.com |
                                    <a href="{{ route('login') }}">Admin Login </a> |<a href="
                                    {{ route('submission') }}
                                    "> Submit Listing </a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
            {{-- end Footer --}}
        </div>
    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Jasny-bootstrap  JavaScript -->
    <script src="{{ asset('vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <!-- Toastr JS -->
    {{-- <script src="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('dist/js/toast-data.js') }}"></script> --}}
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
    <!-- Dropzone JavaScript -->
    <script src="{{ asset('vendors/dropzone/dist/dropzone.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('dist/js/init.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/dashboard-data.js') }}"></script> --}}
</body>

</html>
