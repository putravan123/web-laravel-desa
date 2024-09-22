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
    
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Tambah Data Dokumen
                </div>
                <div class="card-body">
                    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="nama_dokument" class="form-label">Nama Dokumen</label>
                                <input type="text" id="nama_dokument" name="nama_dokument" class="form-control" value="{{ old('nama_dokument') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="jenis_id" class="form-label">Jenis Dokumen</label>
                                <select id="jenis_id" name="jenis_id" class="form-control" required>
                                    <option value="">Pilih Jenis Dokumen</option>
                                    @foreach ($jenis as $id => $jenis_surat)
                                        <option value="{{ $id }}" {{ old('jenis_id') == $id ? 'selected' : '' }}>
                                            {{ $jenis_surat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tambahkan input untuk upload gambar -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="image" class="form-label">Gambar Dokumen</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Buat</button>
                            <a class="btn btn-secondary" href="{{ route('document.index') }}" style="margin-left: 5px;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
