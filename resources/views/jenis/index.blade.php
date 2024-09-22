@extends('template.app')
@section('title', 'Jenis')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <!-- Tombol untuk menambah jenis surat baru -->
        <a href="{{ route('jenis.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus"></i>Buat Jenis Surat Baru</a>
        
        <!-- Dropdown untuk memilih jumlah item per halaman -->
        <div style="margin-left: 10px">
            <form action="{{ route('jenis.index') }}" method="GET">
                <select name="p" onchange="this.form.submit()" class="form-select">
                    <option value="5" {{ request('p') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('p') == 10 ? 'selected' : '' }}>10</option>
                    <option value="50" {{ request('p') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('p') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
        </div>
        
        <!-- Form Pencarian -->
        <form action="{{ route('jenis.index') }}" method="GET" class="d-flex mb-0 ml-auto">
            <div class="input-group">
                <input type="text" name="search" placeholder="cari" value="{{ request('search') }}" class="form-control">
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
                        <th>Jenis Surat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($jenis as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->jenis_surat }}</td>
                            <td>
                                <a href="{{ route('jenis.edit', $item->id) }}" class="btn btn-outline-dark"><i class="bi bi-pen"></i>Edit</a>
                                <form action="{{ route('jenis.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-warning" onclick="return confirm('Yakin ingin Menghapus Jenis Dokumen INI ?')"><i class="bi bi-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Menampilkan Pagination -->
        <div class="d-flex justify-content-center">
            {{ $jenis->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
