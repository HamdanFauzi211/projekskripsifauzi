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
        Schema::create('interpretasi_hasils', function (Blueprint $table) {
            $table->id();
            $table->enum('kesimpulan',
            [
                'Advance',
                'Normal',
                'Caution',
                'Delay'
            ]);
            $table->string('keterangan');
            $table->string('arti');
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
        Schema::dropIfExists('interpretasi_hasils');
    }
};
