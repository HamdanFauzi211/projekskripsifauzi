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
        Schema::create('jadwal_penilaians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jadwal');
            $table->date('tanggal');
            $table->unsignedBigInteger('kategori_umur_id');
            $table->timestamps();
            $table->foreign('kategori_umur_id')->references('id')->on('kategori_umurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_penilaians');
    }
};
