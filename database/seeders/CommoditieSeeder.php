<?php

namespace Database\Seeders;

use App\Models\Commoditie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/commoditie.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Commoditie::create(
                    [
                        "commodity_code" => $data['0'],
                        "commodity_name" => $data['1'],
                        "unit_shortcut" => $data['2'],
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
