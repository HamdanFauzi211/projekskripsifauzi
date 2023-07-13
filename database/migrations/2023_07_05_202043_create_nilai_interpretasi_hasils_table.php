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
        Schema::create('nilai_interpretasi_hasils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interpretasi_hasil_id');
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('jadwal_Penilaian_id');
            $table->unsignedBigInteger('aspek_perkembangan_id');
            $table->timestamps();
            $table->foreign('interpretasi_hasil_id')->references('id')->on('interpretasi_hasils');
            $table->foreign('siswa_id')->references('id')->on('siswas');
            $table->foreign('jadwal_penilaian_id')->references('id')->on('jadwal_penilaians');
            $table->foreign('aspek_perkembangan_id')->references('id')->on('aspek_perkembangans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_interpretasi_hasils');
    }
};
