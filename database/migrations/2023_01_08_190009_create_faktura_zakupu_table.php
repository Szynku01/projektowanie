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
        Schema::create('faktura_zakupu', function (Blueprint $table) {
            $table->integer('numer_faktury', true);
            $table->date('data_zakupu');
            $table->decimal('wartosc_brutto', 10,2 );
            $table->decimal('wartosc_netto', 10,2 );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktura_zakupu');
    }
};
