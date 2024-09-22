<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Document;
use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type', 5);
        $type = in_array($type, [5, 10, 50, 100])? $type: 5 ;
        $surats = Surat::query()
        ->when($search, function($query, $search){
            return $query->Where('nama_lengkap', 'like', "%{$search}%");
        })
        ->paginate($type)
        ->appends($request->except('page'));

        return view('surat.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Surat $surats)
    {
        $document = Document::pluck('nama_dokument', 'id');

        return view('surat.create', compact('document'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'catatan_tambahan' => 'nullable|string',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'agama' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'nullable|string|max:50',
            'status_kawin' => 'nullable|string|max:50',
            'kewarganegaraan' => 'nullable|string|max:50',
            'dokumen_id' => 'required|exists:document,id',
        ]);
    
        $exists = DB::table('data')
            ->where('nik', $request->nik)
            ->where('nama', $request->nama_lengkap)
            ->where('tempat_lahir', $request->tempat_lahir)
            ->where('rt', $request->rt)
            ->where('rw', $request->rw)
            ->exists();
    
        if (!$exists) {
            return redirect()->back()->withErrors([
                'error' => 'Data Anda belum terdaftar. Mohon hubungi kelurahan Anda.'
            ])->withInput();
        }
    
        $validata = $request->all();
    
        if ($request->hasFile('ktp')) {
            $validata['ktp'] = $request->file('ktp')->store('ktp_files', 'public');
        }
    
        if ($request->hasFile('kk')) {
            $validata['kk'] = $request->file('kk')->store('kk_files', 'public');
        }
    
        Surat::create($validata);
    
        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan!');
    }
    
    
    public function form_surat($dokumen_id)
    {
        $documents = Document::pluck('nama_dokument', 'id');
        $surats = Surat::all();
        return view('hompage.formdokumen', compact('documents', 'surats', 'dokumen_id'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function storebuat(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'catatan_tambahan' => 'nullable|string',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'agama' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'nullable|string|max:50',
            'status_kawin' => 'nullable|string|max:50',
            'kewarganegaraan' => 'nullable|string|max:50',
            'dokumen_id' => 'required|exists:document,id',
        ]);
    
        $exists = DB::table('data')
            ->where('nik', $request->nik)
            ->where('nama', $request->nama_lengkap)
            ->where('tempat_lahir', $request->tempat_lahir)
            ->where('rt', $request->rt)
            ->where('rw', $request->rw)
            ->exists();
    
        if (!$exists) {
            return redirect()->back()->withErrors([
                'error' => 'Data Anda belum terdaftar. Mohon hubungi kelurahan Anda.'
            ])->withInput();
        }
    
        $validata = $request->all();
    
        if ($request->hasFile('ktp')) {
            $validata['ktp'] = $request->file('ktp')->store('ktp_files', 'public');
        }
    
        if ($request->hasFile('kk')) {
            $validata['kk'] = $request->file('kk')->store('kk_files', 'public');
        }
    
        // Create the new Surat record
        Surat::create($validata);
    
        return redirect()->back()->with('success', 'Surat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        $surat->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus ');
    }
    
    public function showPDF($id)
    {
        $penduduk = Data::all();
        $surat = Surat::with('dokumen')->findOrFail($id);
        
        $pdf = Pdf::loadView('surat.pdf', compact('surat', 'penduduk'));
    
        return $pdf->stream('surat-' . $id . '.pdf');
    }
    
}
