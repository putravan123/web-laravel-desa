@extends('hompage.template.app')
@section('title', '| Layanan')
@section('content')
    @php
        $no = 1;
    @endphp
    <div class="container mt-5">
        <div class="row">
            @foreach ($documents as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3"> 
                    <div class="card text-center" style="width: 100%;">
                        <h1 class="my-3">{{ $no++ }}</h1>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_dokument }}</h5>
                            <p class="card-text">
                                buat
                            </p>
                            <a href="{{ route('form_surat', ['dokumen_id' => $item->id]) }}" class="btn btn-primary">Buat Surat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
