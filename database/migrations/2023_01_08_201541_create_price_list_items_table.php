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
        Schema::create('price_list_items', function (Blueprint $table) {
            $table->integer('item_number', true);
            $table->decimal('price', 10, 2);
            $table->string('commodity_code');
            $table->foreign('commodity_code')
                ->references('commodity_code')
                ->on('commodities'); 
            $table->integer('price_list_id');
            $table->foreign('price_list_id')
                ->references('price_list_number')
                ->on('price_lists');         
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_list_items');
    }
};
