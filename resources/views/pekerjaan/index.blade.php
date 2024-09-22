@extends('template.app')
@section('title', 'Pekerjaan')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <!-- Tombol untuk menambah pengguna baru -->
        <a href="{{ route('pekerjaan.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus"></i>Buat Pekerjaan</a>
        <div style="margin-left: 10px">
            <form action="{{ route('pekerjaan.index') }}" method="GET">
                <select name="p" onchange="this.form.submit()">
                    <option value="5" {{ request('p') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('p') == 10 ? 'selected' : '' }}>10</option>
                    <option value="50" {{ request('p') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('p') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
        </div>
        <!-- Form Pencarian -->
        <form action="{{ route('pekerjaan.index') }}" method="GET" class="d-flex mb-0 ml-auto">
            <div class="input-group">
                <input type="text" name="search" placeholder="Cari Pekerjaan" value="{{ request('search') }}" class="form-control">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i>Search</button>
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
                        <th>No</th>
                        <th>Nama Pekerjaan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($pekerjaans as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$item->nama_pekerjaan}}</td>
                            <td>
                                <a href="{{ route('pekerjaan.edit', $item->id) }}" class="btn btn-outline-dark"><i class="bi bi-pen"></i>Edit</a>
                                <form action="{{ route('pekerjaan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-warning" onclick="return confirm('yakin ingin mengapus data')"><i class="bi bi-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Menampilkan Pagination -->
        <div class="d-flex justify-content-center">
            {{ $pekerjaans->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection