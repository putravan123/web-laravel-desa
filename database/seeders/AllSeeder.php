<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'id' => 1,
                'nama' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama' => 'User Biasa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'kategory_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('pekerjaan')->insert([
            [
                'id' => 1,
                'nama_pekerjaan' => 'Pekerjaan 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama_pekerjaaan' => 'Pekerjaan 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('data')->insert([
            [
                'id' => 1,
                'nama' => 'Puta',
                'alamat' => 'Jl. Contoh No. 123',
                'no_telepon' => '081234567890',
                'tempat_lahir' => 'jawa Barat',
                'email' => 'Putra@example.com',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'L',
                'pekerjaan_id' => 1,
                'no_kk' => '1234567890123456',
                'nik' => '1234567890123456',
                'status_kawin' => 'Blum Kawin',
                'agama' => 'Islam',
                'pendidikan_terakhir' => 'S1',
                'kewarganegaraan' => 'WNI',
                'rt' => '01',
                'rw' => '02',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('jenis')->insert([
            [
                'id' => 1,
                'jenis_surat' => 'Surat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'jenis_surat' => 'Surat Permohonan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'jenis_surat' => 'Surat Pemberitahuan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'jenis_surat' => 'Surat Kuasa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('document')->insert([
            [
                'id' => 1,
                'nama_dokument' => 'Surat izin',
                'tambahkan_oleh' => 'Admin',
                'jenis_id' => 1, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama_dokument' => 'Dokumen 2',
                'tambahkan_oleh' => 'User',
                'jenis_id' => 2, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('surat')->insert([
            [
                'id' => 1,
                'nik' => '1234567890123456',
                'nama_lengkap' => 'John Doe',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'catatan_tambahan' => 'Catatan tambahan contoh',
                'ktp' => 'ktp_file_path',
                'kk' => 'kk_file_path',
                'rt' => 'RT001',
                'rw' => 'RW001',
                'agama' => 'Islam',
                'pendidikan_terakhir' => 'S1',
                'status_kawin' => 'Belum Kawin',
                'kewarganegaraan' => 'WNI',
                'dokumen_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
