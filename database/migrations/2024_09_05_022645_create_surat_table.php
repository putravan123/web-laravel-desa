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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('catatan_tambahan')->nullable();
            $table->string('ktp')->nullable();  
            $table->string('kk')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('kewarganegaraan')->nullable(); 
            $table->unsignedBigInteger('dokumen_id');
            $table->foreign('dokumen_id')->references('id')->on('document');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
