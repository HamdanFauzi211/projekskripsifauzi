<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_interpretasi_akhirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('interpretasi_akhir_id');
            $table->unsignedBigInteger('jadwal_penilaian_id');
            $table->timestamps();
            $table->foreign('siswa_id')->references('id')->on('siswas');
            $table->foreign('interpretasi_akhir_id')->references('id')->on('interpretasi_akhirs');
            $table->foreign('jadwal_penilaian_id')->references('id')->on('jadwal_penilaians');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_interpretasi_akhirs');
    }
};
