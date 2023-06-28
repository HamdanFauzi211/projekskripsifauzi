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
        Schema::create('item_perintahs', function (Blueprint $table) {
            $table->id();
            $table->string('perintah');
            $table->unsignedBigInteger('aspek_perkembangan_id');
            $table->unsignedBigInteger('kategori_umur_id');
            $table->timestamps();
            $table->foreign('aspek_perkembangan_id')->references('id')->on('aspek_perkembangans');
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
        Schema::dropIfExists('item_perintahs');
    }
};
