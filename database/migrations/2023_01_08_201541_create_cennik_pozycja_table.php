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
        Schema::create('cennik_pozycja', function (Blueprint $table) {
            $table->integer('numer_pozycji', true);
            $table->decimal('cena', 10, 2);
            $table->string('towar_kod_towaru', 4);
            $table->foreign('towar_kod_towaru')
                ->references('kod_towaru')
                ->on('towar');        
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cennik_pozycja');
    }
};
