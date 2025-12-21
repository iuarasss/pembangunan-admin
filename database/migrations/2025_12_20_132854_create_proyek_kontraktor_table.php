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
        Schema::create('proyek_kontraktor', function (Blueprint $table) {
    $table->unsignedInteger('id_proyek');
    $table->unsignedInteger('id_kontraktor');

    $table->primary(['id_proyek', 'id_kontraktor']);

    $table->foreign('id_proyek')
          ->references('id_proyek')
          ->on('proyek')
          ->onDelete('cascade');

    $table->foreign('id_kontraktor')
          ->references('kontraktor_id')
          ->on('kontraktor')
          ->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek_kontraktor');
    }
};
