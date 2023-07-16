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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp', 16);
            $table->string('username');
            $table->string('password');
            $table->enum('role',
            [
                'Admin',
                'Guru',
                'Pakar',
                'OrangTua'
            ]);
            $table->unsignedBigInteger('siswa_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('siswa_id')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
