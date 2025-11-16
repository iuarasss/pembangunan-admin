<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tahapan_proyek', function (Blueprint $table) {
            $table->id('tahap_id');
            $table->unsignedInteger('proyek_id'); // INT UNSIGNED, sesuai id_proyek
            $table->string('nama_tahap');
            $table->decimal('target_persen', 5, 2)->default(0);
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')
                  ->references('id_proyek')
                  ->on('proyek')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tahapan_proyek');
    }
};
