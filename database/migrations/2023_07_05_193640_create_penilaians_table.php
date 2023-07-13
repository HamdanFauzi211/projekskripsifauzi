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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->enum('nilai',
            [
                'Lulus',
                'Tidak Lulus',
                'Menolak'
            ]);
            $table->string('skor');
            $table->unsignedBigInteger('item_perintah_id');
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('jadwal_penilaian_id');
            $table->timestamps();
            $table->foreign('item_perintah_id')->references('id')->on('item_perintahs');
            $table->foreign('siswa_id')->references('id')->on('siswas');
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
        Schema::dropIfExists('penilaians');
    }
};
