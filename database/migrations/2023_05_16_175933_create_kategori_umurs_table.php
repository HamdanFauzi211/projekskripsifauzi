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
        Schema::create('kategori_umurs', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori_umur',
            [
                '0-3 Bulan',
                '3-6 Bulan',
                '6-9 Bulan',
                '9-12 Bulan',
                '12-18 Bulan',
                '18-24 Bulan',
                '24-36 Bulan',
                '36-48 Bulan',
                '48-60 Bulan',
                '60-72 Bulan',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_umurs');
    }
};
