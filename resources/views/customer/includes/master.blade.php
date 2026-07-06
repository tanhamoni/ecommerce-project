<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Customer Dashboard</title>

    <!-- Font Awesome -->
    <link href="{{ asset('customer/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- SB Admin CSS -->
    <link href="{{ asset('customer/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        #wrapper {
            min-height: 100vh;
            display: flex;
        }

        #content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #content {
            flex: 1;
        }

        footer.sticky-footer {
            margin-top: auto;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('customer.includes.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper">

            <!-- Main Content -->
            <div id="content">

                <!-- Header -->
                @include('customer.includes.header')

                <!-- Page Content -->
                @yield('content')

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            @include('customer.includes.footer')

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Wrapper -->

    <!-- Scroll Top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- jQuery -->
    <script src="{{ asset('customer/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('customer/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- jQuery Easing -->
    <script src="{{ asset('customer/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- SB Admin JS -->
    <script src="{{ asset('customer/js/sb-admin-2.min.js') }}"></script>

</body>

</html>