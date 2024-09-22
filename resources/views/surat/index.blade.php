@extends('template.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <!-- Tombol untuk menambah surat baru -->
            <a href="{{ route('surat.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus"></i>Buat Surat Baru</a>

            <!-- Dropdown untuk memilih jumlah per halaman -->
            <div style="margin-left: 10px">
                <form action="{{ route('surat.index') }}" method="GET">
                    <select name="p" onchange="this.form.submit()">
                        <option value="5" {{ request('p') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('p') == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ request('p') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('p') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
            </div>

            <!-- Form Pencarian -->
            <form action="{{ route('surat.index') }}" method="GET" class="d-flex mb-0 ml-auto">
                <div class="input-group">
                    <input type="text" name="search" placeholder="Cari Nama"
                        value="{{ request('search') }}" class="form-control">
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
                            <th>No</th>
                            <th>Nama Surat</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Pesan Dari Pembuat Surat</th>
                            <th>Waktu Di Buat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($surats as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->dokumen->nama_dokument }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{$item->catatan_tambahan}}</td>
                                <td>{{$item->created_at->format('d-m-Y, H:i')}}</td>
                                <td>
                                    <a href="{{ route('surat.edit', $item->id) }}"  class="btn btn-outline-dark" ><i class="bi bi-pen"></i>Edit</a>
                                    <a href="{{ route('surat.pdf', $item->id) }}" class="btn btn-outline-danger" target="_blank"><i class="bi bi-printer-fill"></i> print</a>
                                    <form action="{{ route('surat.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-warning" onclick="return confirm('Yakin Ingin Menghapus Permintaan ?')"><i class="bi bi-trash"></i>delet</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Menampilkan Pagination -->
            <div class="d-flex justify-content-center">
                {{ $surats->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
