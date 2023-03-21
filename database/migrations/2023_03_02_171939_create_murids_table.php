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
        Schema::create('murids', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto_diri')->nullable();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('id_agama');
            $table->string('alamat');
            $table->string('nis')->unique();
            $table->string('nohp')->nullable();
            $table->string('email')->unique();
            $table->string('ayah')->nullable();
            $table->string('kerja_ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('kerja_ibu')->nullable();
            $table->string('nohp_ortu')->nullable();
            $table->string('wali')->nullable();
            $table->string('kerja_wali')->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murids');
    }
};
