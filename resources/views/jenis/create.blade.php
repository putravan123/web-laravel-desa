@extends('template.app') 
@section('title', 'Tambah Data Penduduk')
@section('content')
<div class="container mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Tambah Data Penduduk
                </div>
                <div class="card-body">
                    <form action="{{ route('jenis.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jenis_surat">Jenis Surat</label>
                                <input type="text" name="jenis_surat" id="jenis_surat" value="{{ old('jenis_surat') }}" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Buat</button>
                            <a class="btn btn-secondary" href="{{ route('jenis.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
