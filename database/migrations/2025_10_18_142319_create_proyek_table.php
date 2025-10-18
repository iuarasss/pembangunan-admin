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
        Schema::create('proyek', function (Blueprint $table) {
            $table->increments('id_proyek');
            $table->string('kode_proyek')->unique();
            $table->string('nama_proyek');
            $table->integer('tahun');
            $table->string('lokasi');
            $table->decimal('anggaran', 15, 2);
            $table->string('sumber_dana');
            $table->text('deskripsi');
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
