<?php

namespace Database\Seeders;

use App\Models\Purchase_invoice_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Purchase_invoice_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/purchase_invoice_item.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Purchase_invoice_item::create(
                    [
                        "invoice_number_id" => $data['0'],
                        "quantity" => $data['1'],
                        "unit_price" => $data['2'],
                        "brutto_price" => $data['3'],
                        "netto_price" => $data['4'],
                        "VAT_rate" => $data['5'],
                        "commodity_code" => $data['6'],
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
