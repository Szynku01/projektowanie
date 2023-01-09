<?php

namespace Database\Seeders;

use App\Models\Price_list;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Price_listSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/price_list.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Price_list::create(
                    [
                        "date_from" => $data['0'],
                        "date_to" => $data['1'],
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
