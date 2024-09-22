@extends('template.app')
@section('title', 'User')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('users.create') }}" class="btn btn-outline-primary"><i class="bi bi-plus"></i>Buat User</a>
            <div style="margin-left: 10px">
                <form action="{{ route('users.index') }}" method="GET">
                    <select name="p" onchange="this.form.submit()">
                        <option value="5" {{ request('p') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('p') == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ request('p') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('p') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
            </div>
            <form action="{{ route('users.index') }}" method="GET" class="d-flex mb-0 ml-auto">
                <div class="input-group">
                    <input type="text" name="search" placeholder="Cari name atau email" value="{{ request('search') }}"
                        class="form-control">
                    <button class="btn btn-primary" type="submit"> <i class="bi bi-search"></i> Cari</button>
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
                            <th>Foto</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>DI Tambahkan</th>
                            {{-- <th>Di Edit</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if ($user->image)
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="aaaaa"
                                            style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <img src="{{ asset('img/use.png') }}" alt="Default User Icon" class="img-fluid"
                                            style="max-width: 50px;">
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->kategori->nama }}</td>
                                <td>{{ $user->created_at->format('l, d-m-Y') }}</td>
                                {{-- <td>{{ $user->updated_at->format('d-m-Y') }}</td> --}}
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-dark"><i class="bi bi-pen"></i>Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-warning"onclick="return confirm('yakin ingin menghapus?')"><i class="bi bi-trash"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Menampilkan Pagination -->
            <div class="d-flex justify-content-center">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
