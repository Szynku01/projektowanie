<?php

namespace Database\Seeders;

use App\Models\Sales_invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sales_invoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/sales_invoice.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Sales_invoice::create(
                    [
                        "sale_date" => $data['0'],
                        "brutto_value" => $data['1'],
                        "netto_value" => $data['2'],
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
