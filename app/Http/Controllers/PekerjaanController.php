<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $item = $request->input('p', 5);
        $item = in_array($item, [5, 10, 50, 100]) ? $item : 5;

        $pekerjaans = Pekerjaan::query()
            ->when($search, function($query, $search){
                return $query->where('nama_pekerjaan', 'like', "%{$search}%");
            })
            ->paginate($item)
            ->appends($request->except('page'));

        return view('pekerjaan.index', compact('pekerjaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pekerjaan.creta'); // Make sure you have a create.blade.php file
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => $request->input('nama_pekerjaan'),
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Berhasil Menambahkan Pekerjaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerjaan $pekerjaans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        return view('pekerjaan.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerjaan $pekerjaans)
    {
        $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
        ]);

        $pekerjaans->update([
            'nama_pekerjaan' => $request->input('nama_pekerjaan'),
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Pekerjaan');
    }
}
