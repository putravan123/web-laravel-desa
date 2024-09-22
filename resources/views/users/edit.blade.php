@extends('template.app')
@section('title', 'Edit')
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
                    Edit Data User
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Pengguna</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @if ($user->image)
                                        <div class="mt-3">
                                            <img id="imagePreview" src="{{ asset('storage/' . $user->image) }}" alt="Gambar Profil" style="width: 150px; height: auto;">
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" name="remove_image" id="remove_image" class="form-check-input">
                                            <label for="remove_image" class="form-check-label">Hapus Gambar Saat Ini</label>
                                        </div>
                                    @else
                                        <div class="mt-3">
                                            <img id="imagePreview" style="width: 150px; height: auto; display: none;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategory_id">Kategori</label>
                                    <select name="kategory_id" id="kategory_id" class="form-control" required>
                                        @foreach($kategori as $item)
                                            <option value="{{ $item->id }}" {{ old('kategory_id', $user->kategory_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                            <a class="btn btn-secondary ms-2" href="{{ route('users.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    