<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type', 5);
        $type = in_array($type, [5, 10, 50, 100])? $type : 5 ;
        $jenis = Jenis::query()
            ->when($search, function($query, $search){
                return $query->where('jenis_surat', 'like', "%{$search}%");
            })
            ->paginate($type)
            ->appends($request->except('page'));

        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_surat' => 'required|string|max:255',  
        ]);

        Jenis::create($validatedData); 

        return redirect()->route('jenis.index')->with('success', 'Jenis surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        return view('jenis.show', compact('jenis'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        return view('jenis.edit', compact('jenis'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis $jenis)
    {
        $validatedData = $request->validate([
            'jenis_surat' => 'required|string|max:255',  
        ]);

        $jenis->update($validatedData);

        return redirect()->route('jenis.index')->with('success', 'Jenis surat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete(); 

        return redirect()->route('jenis.index')->with('success', 'Jenis surat berhasil dihapus');
    }
}
