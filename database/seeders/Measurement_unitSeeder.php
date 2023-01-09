<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Measurement_unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Measurement_unitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/measurement_unit.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Measurement_unit::create(
                    [
                        "unit_shortcut" => $data['0'],
                        "name" => $data['1'],
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
