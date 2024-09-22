@extends('template.app')
@section('title', 'Data')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <!-- Tombol untuk menambah pengguna baru -->
        <a href="{{ route('data.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus"></i>Tambah Data Warga</a>
        
        <!-- Form Pencarian -->
        <form action="{{ route('data.index') }}" method="GET" class="d-flex mb-0 ml-auto">
            <div class="input-group">
                <input type="text" name="search" placeholder="Cari Nama Atau Nik" value="{{ request('search') }}" class="form-control">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i>Cari</button>
            </div>
        </form>
    </div>
    
    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>Nomor</th>
                        <th>Nik</th>
                        <th>Nomor kk</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$item->nik}}</td>
                            <td>{{$item->no_kk}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                @if($item->jenis_kelamin == 'L')
                                    Laki-laki
                                @elseif($item->jenis_kelamin == 'P')
                                    Perempuan
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{ route('data.edit', $item->id) }}" class="btn btn-outline-dark"><i class="bi bi-pen"></i>Edit</a>
                                <form action="{{ route('data.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-warning" onclick="return confirm('Yakin Ingin Menghaspus Data InI')"><i class="bi bi-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Menampilkan Pagination -->
        <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection