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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama');
            $table->enum('jenis_kelamin',
            [
                'Laki-laki',
                'Perempuan'
            ]);
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->timestamps();
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
