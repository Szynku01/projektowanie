<?php

namespace Database\Seeders;

use App\Models\Price_list_item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Price_list_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/price_list_item.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100)) !== FALSE) {
            if (!$firstLine) {
                Price_list_item::create(
                    [
                        "price" => $data
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
