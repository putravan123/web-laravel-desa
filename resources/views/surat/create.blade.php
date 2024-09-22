@extends('template.app')

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

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Tambah Data Surat
                </div>
                <div class="card-body">
                    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="dokumen_id" class="form-label">Nama Dokumen</label>
                                <select name="dokumen_id" id="dokumen_id" class="form-control">
                                    @foreach($document as $id => $nama_dokument)
                                        <option value="{{ $id }}">{{ $nama_dokument }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="rt" value="{{ old('rt') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="rw" value="{{ old('rw') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ktp" class="form-label">KTP (Optional)</label>
                                <input type="file" class="form-control" id="ktp" name="ktp">
                            </div>
                            <div class="col-md-6">
                                <label for="kk" class="form-label">KK (Optional)</label>
                                <input type="file" class="form-control" id="kk" name="kk">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="catatan_tambahan" class="form-label">Catatan Tambahan (Optional)</label>
                            <textarea class="form-control" id="catatan_tambahan" name="catatan_tambahan" rows="3">{{ old('catatan_tambahan') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a class="btn btn-secondary" href="{{ route('surat.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
