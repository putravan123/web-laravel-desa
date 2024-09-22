<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CobbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surat')->insert([
            [
                'nik' => '1234567890123456',
                'nama_lengkap' => 'ujang',
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
                'dokumen_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
