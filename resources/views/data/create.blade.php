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
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Tambah Data Penduduk
                </div>
                <div class="card-body">
                    <form action="{{ route('data.store') }}" method="POST">
                        @csrf
                        
                        <!-- Informasi Pribadi -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" name="rt" class="form-control" value="{{ old('rt') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" name="rw" class="form-control" value="{{ old('rw') }}">
                            </div>
                        </div>

                        <!-- Kontak dan Identifikasi -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>

                        <!-- Data Pribadi -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tempat_lahir" class="form-label">tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                                <select name="pekerjaan_id" class="form-control">
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    @foreach($pekerjaan as $p)
                                        <option value="{{ $p->id }} ">
                                            {{$p->nama_pekerjaan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Identitas Keluarga -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="no_kk" class="form-label">No KK</label>
                                <input type="text" name="no_kk" class="form-control" value="{{ old('no_kk') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
                            </div>
                        </div>

                        <!-- Status dan Pendidikan -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status_kawin" class="form-label">Status Kawin</label>
                                <input type="text" name="status_kawin" class="form-control" value="{{ old('status_kawin') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan_terakhir" class="form-control" value="{{ old('pendidikan_terakhir') }}">
                            </div>
                        </div>

                        <!-- Agama dan Kewarganegaraan -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" name="agama" class="form-control" value="{{ old('agama') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select name="kewarganegaraan" class="form-control">
                                    <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                                    <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Buat</button>
                            <a class="btn btn-secondary" href="{{ route('data.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
