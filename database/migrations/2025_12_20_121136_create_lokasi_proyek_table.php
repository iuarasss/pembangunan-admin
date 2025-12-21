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
    Schema::create('lokasi_proyek', function (Blueprint $table) {
        $table->increments('lokasi_id');
        $table->unsignedInteger('id_proyek');
        $table->decimal('lat', 10, 7);
        $table->decimal('lng', 10, 7);
        $table->text('geojson')->nullable();
        $table->timestamps();

        $table->foreign('id_proyek')
              ->references('id_proyek')
              ->on('proyek')
              ->onDelete('cascade');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('lokasi_proyek');
    }
};
