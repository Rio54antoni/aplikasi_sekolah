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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa');
            $table->string('id_mapel');
            $table->string('id_kelas');
            $table->string('id_tahun');
            $table->string('absensi')->nullable();
            $table->string('nilai_tugas')->nullable();
            $table->string('nilai_ulangan')->nullable();
            $table->string('nilai_uts')->nullable();
            $table->string('nilai_uas')->nullable();
            $table->string('ratarata')->nullable();
            $table->string('status_poin')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
