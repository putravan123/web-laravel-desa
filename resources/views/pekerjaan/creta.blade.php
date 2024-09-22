@extends('template.app') 

@section('title', 'Tambah')

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
                    Tambah Pekerjaan
                </div>
                <div class="card-body">

                    <form action="{{route('pekerjaan.store')}}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_pekerjaan">Nama Pekerjaan</label>
                                <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" required>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Buat</button>
                            <a class="btn btn-secondary" style="margin-left: 5px" href="{{route('pekerjaan.index')}}">Kembali</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection