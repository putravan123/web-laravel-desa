<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\SuratController;
use App\Models\Data;
use App\Models\Document;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hompage.dashboard');
})->name('home');

Route::get('/layanan', function () {
    $documents = Document::all();
    return view('hompage.layanan', compact('documents'));
})->name('layanan');

Route::post('/surat/store', [SuratController::class, 'storebuat'])->name('surat.buat');
Route::get('/Buat-Surat/{dokumen_id}', [SuratController::class, 'form_surat'])->name('form_surat');

Route::get('/dashboard', function () {
    $data = Data::with('pekerjaan')->get();
    $maleCount = $data->where('jenis_kelamin', 'L')->count();
    $femaleCount = $data->where('jenis_kelamin', 'P')->count();
    return view('template.dashboard', compact('data', 'maleCount', 'femaleCount'));
})->name('dashboard')->middleware('auth');


// Menampilkan form login
Route::get('/login', function () {
    return view('auth.login');
})->name('login_form');

// Memproses login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Menampilkan form pendaftaran
Route::get('/register', function () {
    return view('auth.register');
})->name('register_form');

// Memproses pendaftaran
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute resource untuk pengguna
Route::resource('/users', AuthController::class);
Route::get('users/{user}', [AuthController::class, 'show'])->name('users.show');


// Rute resource untuk kategori
Route::resource('/kategori', KategoriController::class);

// Rute resource untuk data
Route::resource('/data', DataController::class);

// Rute resource untuk pekerjaan
Route::resource('/pekerjaan', PekerjaanController::class);

Route::resource('/document', DocumentController::class);

Route::resource('/jenis', JenisController::class);

Route::resource('surat', SuratController::class);
Route::get('surat/{id}/pdf', [SuratController::class, 'showPDF'])->name('surat.pdf');
