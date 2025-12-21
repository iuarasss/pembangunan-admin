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
        Schema::create('progres_proyek', function (Blueprint $table) {
            $table->increments('progres_id');

            $table->unsignedInteger('id_proyek');

            $table->unsignedBigInteger('tahap_id')->nullable();
            $table->decimal('persen_real', 5, 2);
            $table->date('tanggal');
            $table->text('catatan')->nullable();
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
            Schema::dropIfExists('progres_proyek');
        }
    };
