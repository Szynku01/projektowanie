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
        Schema::create('purchase_invoice_items', function (Blueprint $table) {
        $table->integer('item_number', true);
        $table->integer('invoice_number_id');
        $table->foreign('invoice_number_id')
            ->references('invoice_number')
            ->on('purchase_invoices');
        $table->integer('quantity');
        $table->decimal('unit_price', 10,2 );
        $table->decimal('brutto_price', 10,2 );
        $table->decimal('netto_price', 10,2 );
        $table->integer('VAT_rate');
        $table->string('commodity_code');
        $table->foreign('commodity_code')
            ->references('commodity_code')
            ->on('commodities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_invoice_items');
    }
};
