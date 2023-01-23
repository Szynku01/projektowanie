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
        Schema::create('commodities', function (Blueprint $table) {
            $table->string('commodity_code', 4)->unique();
            $table->string('commodity_name',50)->unique();
            $table->string('unit_shortcut'); 
            $table->foreign('unit_shortcut')
                ->references('unit_shortcut')
                ->on('measurement_units');       
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodities');
    }
};
