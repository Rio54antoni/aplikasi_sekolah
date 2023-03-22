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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto_diri');
            $table->string('nik')->unique();
            $table->string('foto_ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('foto_npwp')->nullable();
            $table->string('jenis_kelamin'); //Laki-laki dan Perempuan
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('agama'); // Islam, Kristen, Hindu, Buddha, Katolik, Kong Hu Chu dan Dll
            $table->string('nip');
            $table->string('id_pendidikan');
            $table->string('gelar')->nullable();
            $table->string('foto_ijazah')->nullable();
            $table->string('alamat');
            $table->string('sts_pernikahan'); //Menikah dan Belum menikah
            $table->string('id_jabatan'); //id table jabatan
            $table->string('id_status'); //id table status
            $table->date('tgl_daftar')->nullable();
            $table->string('email')->nullable();
            $table->string('telpon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
