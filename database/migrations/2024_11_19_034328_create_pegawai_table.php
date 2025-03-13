<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->foreignId('devisi_id')->constrained('devisi')->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->string('status');
            $table->enum('gender', ['pria', 'wanita']);
            $table->string('telepon')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    

    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropColumn('foto'); 
        });
    }
};
