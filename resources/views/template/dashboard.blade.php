@extends('template/app')

@section('content')
    <style>
        .card-data {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            height: 100%;
        }

        .card-data:hover {
            transform: scale(1.05);
        }

        .card-data .bi {
            font-size: 40px;
            color: #007bff;
        }

        .des {
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }

        .cl {
            font-size: 18px;
            color: #555;
            font-weight: normal;
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            <!-- Jumlah Warga -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-data">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-center">
                            <div class="des">Jumlah Warga</div>
                            <div class="cl">{{ $data->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Laki-laki -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-data">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <i class="bi bi-gender-male"></i>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-center">
                            <div class="des">Laki-laki</div>
                            <div class="cl">{{ $maleCount }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Perempuan -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-data">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <i class="bi bi-gender-female"></i>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-center">
                            <div class="des">Perempuan</div>
                            <div class="cl">{{ $femaleCount }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
