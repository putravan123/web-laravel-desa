@extends('template.app') 

@section('title' ,'Edit')

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
                    Edit Data Penduduk
                </div>
                <div class="card-body">
                    <form action="{{ route('data.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $data->nama) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat', $data->alamat) }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" id="no_telepon" name="no_telepon" class="form-control" value="{{ old('no_telepon', $data->no_telepon) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $data->email) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                    <option value="L" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                                <select id="pekerjaan_id" name="pekerjaan_id"class="form-control">
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    @foreach ($pekerjaan as $pekerjaanItem)
                                        <option value="{{ $pekerjaanItem->id }}" {{ old('pekerjaan_id', $data->pekerjaan_id) == $pekerjaanItem->id ? 'selected' : '' }}>
                                            {{ $pekerjaanItem->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="no_kk" class="form-label">No KK</label>
                                <input type="text" id="no_kk" name="no_kk" class="form-control" value="{{ old('no_kk', $data->no_kk) }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control" value="{{ old('nik', $data->nik) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="status_kawin" class="form-label">Status Kawin</label>
                                <input type="text" id="status_kawin" name="status_kawin" class="form-control" value="{{ old('status_kawin', $data->status_kawin) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" id="agama" name="agama" class="form-control" value="{{ old('agama', $data->agama) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control" value="{{ old('pendidikan_terakhir', $data->pendidikan_terakhir) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select id="kewarganegaraan" name="kewarganegaraan" class="form-control">
                                    <option value="WNI" {{ old('kewarganegaraan', $data->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>WNI</option>
                                    <option value="WNA" {{ old('kewarganegaraan', $data->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>WNA</option>
                                </select>
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

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                            <a class="btn btn-secondary" href="{{ route('data.index') }}">Kembali</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
