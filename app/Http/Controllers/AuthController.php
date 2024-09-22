<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $p = $request->input('p', 5);  
    
        $p = in_array($p, [5, 10, 50, 100]) ? $p : 5;
    
       $users =User::query()
            ->when($search, function ($query, $search) {
                return $query->Where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like',"%{$search}%");
                // ->orWhere('no', 'like', "%{$search}%")
            })
            ->paginate($p)
            ->appends($request->except('page'));
    
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kategori = Kategori::all();
        return view('users.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'image' => 'required|file|mimes:png,jpg',
            'password' => 'required|string|min:8|confirmed',
            'kategory_id' => 'required|exists:kategori,id'
        ]);

        $image = $request->file('image')->store('images', 'public');
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $image,
            'password' => bcrypt($request['password']),
            'kategory_id' => $request['kategory_id'],
        ]);

        return redirect()->route('users.index')->with('success'. 'Berhasil Menabahkan User Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        $kategori = Kategori::all();
        return view('users.edit', compact('user', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'image' => 'nullable|mimes:png,jpg',
            'password' => 'nullable|confirmed|min:8',
            'kategory_id' => 'required|exists:kategori,id',
        ]);
    
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'kategory_id' => $request->input('kategory_id'),
        ];
    
        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }
    
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
            $userData['image'] = $request->file('image')->store('images', 'public');
        } elseif ($request->has('remove_image')) {
            if ($user->image) {
                Storage::delete('public/' . $user->image);
                $userData['image'] = null; 
            }
        }
    
        $user->update($userData);
    
        return redirect()->route('users.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
         
        if ($user->image) {
            Storage::delete($user->image);
        }
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus User');
    }

    public function login(Request $request){
        $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        
        $type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email':'name';
        
        $cek = [
            $type => $request->input('login'),
            'password' =>$request->input('password'),
        ];

        if (Auth::attempt($cek)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Berhasil Login');        
        }
        return redirect()->back()->with('error','maaf Kata sandi Atau Email Salah');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'kategory_id' => 2,
        ]);
        Auth::login($user);

        return redirect()->route('login_form')->with('success', 'Berhasil Menambahkan User');
    }

    public function logout(){
     Auth::logout();
     request()->session()->invalidate();
     request()->session()->regenerateToken();
     return redirect()->route('login_form')->with('success', 'Anda telah berhasil logout.');
    }
}
