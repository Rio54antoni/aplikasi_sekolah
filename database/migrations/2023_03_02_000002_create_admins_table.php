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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto_diri');
            $table->string('nik')->unique();
            $table->string('foto_ktp')->nullable();
            $table->string('alamat');
            $table->string('jenis_kelamin'); //Laki-laki dan Perempuan
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nohp');
            $table->string('email')->unique();
            $table->string('id_agama');
            $table->string('sts_pernikahan'); //Menikah dan Belum menikah
            $table->string('id_pendidikan');
            $table->string('foto_ijazah')->nullable();
            $table->string('id_jabatan'); //id table jabatan
            $table->string('id_status'); //id table status
            $table->date('tgl_daftar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
