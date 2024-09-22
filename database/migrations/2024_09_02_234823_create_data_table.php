<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); 
            $table->string('alamat'); 
            $table->string('no_telepon')->nullable(); 
            $table->string('email')->unique()->nullable(); 
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir'); 
            $table->enum('jenis_kelamin', ['L', 'P']); 
            $table->unsignedBigInteger('pekerjaan_id')->nullable();
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan')->onDelete('set null');
            $table->string('no_kk'); 
            $table->string('nik')->unique();
            $table->string('status_kawin')->nullable(); 
            $table->string('agama');
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('kewarganegaraan')->default('WNI'); 
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
