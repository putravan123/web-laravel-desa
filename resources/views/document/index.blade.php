@extends('template.app')
@section('title', 'Document')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <!-- Button to create a new document -->
        <a href="{{ route('document.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus"></i>Buat Dokumen Baru</a>
        
        <!-- Dropdown for selecting pagination size -->
        <div style="margin-left: 10px">
            <form action="{{ route('document.index') }}" method="GET">
                <select name="p" onchange="this.form.submit()">
                    <option value="5" {{ request('p') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('p') == 10 ? 'selected' : '' }}>10</option>
                    <option value="50" {{ request('p') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('p') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
        </div>
        
        <!-- Search form -->
        <form action="{{ route('document.index') }}" method="GET" class="d-flex mb-0 ml-auto">
            <div class="input-group">
                <input type="text" name="search" placeholder="Cari Dokumen" value="{{ request('search') }}" class="form-control">
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
                        <th>Nama Dokumen</th>
                        <th>Jenis Surat</th>
                        <th>Gambar</th> <!-- Tambahkan kolom untuk gambar -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($documents as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_dokument }}</td>
                            <td>{{ $item->jenis->jenis_surat }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama_dokument }}" width="100px" height="auto"> <!-- Tampilkan gambar -->
                                @else
                                    <span>Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('document.edit', $item->id) }}" class="btn btn-outline-dark"><i class="bi bi-pen"></i> Edit</a>
                                <form action="{{ route('document.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-warning" onclick="return confirm('Yakin Ingin Menghapus Dokumen?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $documents->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
