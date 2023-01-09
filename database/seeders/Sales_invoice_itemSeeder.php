<?php

namespace Database\Seeders;

use App\Models\Sales_invoice_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sales_invoice_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/sales_invoice_item.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Sales_invoice_item::create(
                    [
                        "quantity" => $data['0'],
                        "unit_price" => $data['1'],
                        "brutto_price" => $data['2'],
                        "netto_price" => $data['3'],
                        "VAT_rate" => $data['4'],
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
