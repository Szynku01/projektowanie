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
        Schema::create('pozycja_faktury_sprzedazy', function (Blueprint $table) {
        $table->integer('numer_pozycji', true);
        $table->integer('numer_faktury');
        $table->foreign('numer_faktury')
            ->references('numer_faktury')
            ->on('faktura_sprzedazy');
        $table->integer('ilosc');
        $table->decimal('cena_jednostkowa', 10,2 );
        $table->decimal('cena_brutto', 10,2 );
        $table->decimal('cena_netto', 10,2 );
        $table->integer('stawka_VAT');
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
        Schema::dropIfExists('pozycja_faktury_sprzedazy');
    }
};
