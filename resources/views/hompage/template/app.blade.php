<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pakuwon @yield('title')</title>

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template2/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/style.css') }}" rel="stylesheet">

    <style>
        /* Customize the image to fit the navbar */
        .navbar-brand img {
            max-height: 50px; /* Adjust as per your design */
            width: auto; /* To keep the aspect ratio */
        }

        /* Align the brand image to the left on all screen sizes */
        .navbar {
            justify-content: space-between; /* Ensures the brand stays on the left */
        }

        /* On smaller screens, ensure the navbar-toggler aligns correctly */
        @media (max-width: 991.98px) {
            .navbar-brand {
                margin-left: 15px; /* Adjust the left margin for mobile */
            }

            .navbar-toggler {
                margin-right: 15px; /* Adjust the right margin for mobile */
            }

            .navbar-collapse {
                text-align: center; /* Center the collapsed menu */
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <div class="container-fluid">
            <!-- Aligning image to the left -->
            <a href="#" class="navbar-brand d-flex align-items-center py-0 px-4 px-lg-5">
                <img src="{{ asset('images/j.png') }}" alt="Logo">
            </a>
            
            <!-- Navbar Toggler for mobile -->
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0 d-flex justify-content-center">
                    <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('layanan') }}" class="nav-item nav-link">Layanan Warga</a>
                </div>
                <!-- Responsive Buttons -->
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="me-3 text-center">
                        <a href="{{ route('register') }}" class="dropdown-item">Sign Up</a>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
