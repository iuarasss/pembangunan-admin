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
    Schema::create('kontraktor', function (Blueprint $table) {
        $table->increments('kontraktor_id');
        $table->unsignedInteger('id_proyek');
        $table->string('nama_kontraktor');
        $table->string('penanggung_jawab');
        $table->string('kontak');
        $table->text('alamat');
        $table->timestamps();

        $table->foreign('id_proyek')
              ->references('id_proyek')
              ->on('proyek')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraktor');
    }
};
