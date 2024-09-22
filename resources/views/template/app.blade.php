<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dashboard |  @yield('title')</title>

    <!-- Custom fonts for this template-->
    
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('css/main.css')}}"> --}}

</head>

<body id="page-top">
    <div class="preloader">
        <div class="message">Mohon tunggu...</div>
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template/navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template/footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    {{-- <script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('template/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('template/js/demo/chart-pie-demo.js')}}"></script> --}}
    
    <script src="{{ asset('js/js.js') }}"></script>
</body>

</html>