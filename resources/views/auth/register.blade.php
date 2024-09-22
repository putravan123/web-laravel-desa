<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Register</title>
    <style>
        body {
            /* background: url('path/to/your/background.jpg') no-repeat center center fixed; */
            background-size: cover;
            position: relative;
        }

        .blur-background::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6); 
            backdrop-filter: blur(10px); 
            z-index: 1;
        }

        .custom-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-container {
            position: relative;
            z-index: 2;
        }

        .card {
            background-color: white; 
            border: 1px solid #e0e0e0;
        }

        .card-title {
            color: black; 
        }

        .input-group-text {
            background-color: black; 
            color: white;
        }

        .input-group-text i {
            color: #ffffff; 
        }

        .btn-primary {
            background-color: black;
            border-color: black;
        }

        .btn-primary:hover {
            background-color: #616060;
            border-color: #616060;
        }

        .alert-success {
            background-color: #d4edda; 
            color: #155724;
        }

        .alert-success .alert-link {
            color: #0c6c44;
        }
        .back{
            background: black;
            margin-right: 220px;
            text-align: center;
            border-radius: 7px
        }
        .back a{
            color: #ffffff
        }
    </style>
</head>

<body class="blur-background">
    <div class="d-flex align-items-center justify-content-center vh-100 card-container">
        <div class="custom-shadow card p-4" style="width: 22rem;">
            <div class="back">
                <a href="{{route('home')}}" class="text-decoration-none">Kembali</a>
            </div>
            <h4 class="card-title text-center mb-4">Register</h4>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <div class="input-group">
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Masukkan nama" value="{{ old('name') }}" required>
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Masukkan email" value="{{ old('email') }}" required>
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukkan password" value="{{ old('password') }}" required>
                        <span class="input-group-text" id="togglePasswordPassword">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Masukkan konfirmasi password" value="{{ old('password_confirmation') }}" required>
                        <span class="input-group-text" id="togglePasswordConfirmation">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-user-plus"></i> Register</button>
            </form>
            <div class="mt-3 text-center">
                Sudah punya akun? Login di <a href="{{ route('login_form') }}" class="text-decoration-none">sini</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/newFile.js')}}"></script>
</body>

</html>
