<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(Measurement_unitSeeder::class);
        $this->call(CommoditieSeeder::class);
        $this->call(Price_listSeeder::class);
        $this->call(Price_list_itemSeeder::class);
        $this->call(Purchase_invoiceSeeder::class);
        $this->call(Purchase_invoice_itemSeeder::class);
        $this->call(Sales_invoiceSeeder::class);
        $this->call(Sales_invoice_itemSeeder::class);
    }
}
