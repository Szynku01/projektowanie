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
        Schema::create('towar', function (Blueprint $table) {
            $table->string('kod_towaru', 4)->unique();
            $table->string('nazwa_towaru',10)->unique();
            $table->string('jednostka_miary_skrot_nazwy',4); 
            $table->foreign('jednostka_miary_skrot_nazwy')
            ->references('skrot_nazwy')
            ->on('jednostka_miary');       
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towar');
    }
};
