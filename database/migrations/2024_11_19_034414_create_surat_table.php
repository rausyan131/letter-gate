<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim_id');
            $table->string('penerima_id');
            $table->string('nomor_surat')->unique();
            $table->string('judul');
            $table->string('perihal');
            $table->string('lampiran');
            $table->text('isi_surat');
            $table->date('tanggal_surat');
            $table->timestamps();

            $table->foreign('pengirim_id')->references('nip')->on('pegawai')->onDelete('cascade');
            $table->foreign('penerima_id')->references('nip')->on('pegawai')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
