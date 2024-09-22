<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $item = $request->input('item', 5);
        $item = in_array($item, [5, 10, 50, 100,])?  $item: 5;
        $data = Data::query()
        ->when($search, function($query, $search){
            return $query->where('nama', 'like', "%{$search}%")
            ->orWhere('nik','like', "%{$search}%")
            ->orWhere('no_kk', 'like', "{$search}");
        })
        ->paginate($item)
        ->appends($request->except('page'));

        return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Data $data)
    {
        $pekerjaan = Pekerjaan::all();
        return view('data.create', compact('data', 'pekerjaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email', 
            'tempat_lahir' =>'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'pekerjaan_id' => 'nullable|exists:pekerjaan,id',
            'no_kk' => 'required|string|max:20', 
            'nik' => 'required|string|unique:data,nik|max:20',
            'status_kawin' => 'nullable|string|max:50',
            'agama' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'nullable|string|max:50',
            'kewarganegaraan' => 'nullable|string|in:WNI,WNA',
            'rt' => 'nullable|string|min:3',
            'rw' => 'nullable|string|min:3',
        ]);
        
         Data::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_telepon' => $request['no_telopon'],
            'email' => $request['email'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'jenis_kelamin' => $request['jenisa_kelamin'],
            'pekerjaan_id' => $request['pekerjaan_id'],
            'no_kk' => $request['no_kk'],
            'nik' => $request['nik'],
            'status_kamin' => $request['status_kawin'],
            'agama' => $request['agama'],
            'pendidikan_terakhir' => $request['pendidikan_terakhir'],
            'kewarganegaraan' => $request['kewarganegaraan'],
            'rt' => $request['rt'],
            'rw' => $request['rw'],
        ]);

        return redirect()->route('data.index')->with('success', 'Data Berhasil DI tambahkana');
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Data::findOrFail($id); 
        $pekerjaan = Pekerjaan::all(); 
        return view('data.edit', compact('data', 'pekerjaan')); 
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'tempat_lahir' =>'nullable|string|max:255', 
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'pekerjaan_id' => 'nullable|exists:pekerjaan,id',
            'no_kk' => 'required|string|max:20',
            'nik' => 'required|string|unique:data,nik,' . $id . '|max:20',
            'status_kawin' => 'nullable|string|max:50',
            'agama' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'nullable|string|max:50',
            'kewarganegaraan' => 'nullable|string|in:WNI,WNA',
            'rt' => 'nullable|string|min:3',
            'rw' => 'nullable|string|min:3',
        ]);
        
        $data = Data::findOrFail($id);
        
        $data->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'), 
            'email' => $request->input('email'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'pekerjaan_id' => $request->input('pekerjaan_id'),
            'no_kk' => $request->input('no_kk'),
            'nik' => $request->input('nik'),
            'status_kawin' => $request->input('status_kawin'), 
            'agama' => $request->input('agama'),
            'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
        ]);

        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Data::findOrfail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhail Menghapus Data');
    }
}
