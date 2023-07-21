<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplyUnitsDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('SupplyUnits')->insert(
            [
                [
                    'unit_code' => 'Unit1',
                    'unit_name' => 'Công ty cổ phần Bibica',
                    'unit_email' => 'unit1@gmail.com',
                    'unit_phone' => '0312132232',
                ],
                [
                    'unit_code' => 'Unit2',
                    'unit_name' => 'Công ty bánh kẹo Hải Hà',
                    'unit_email' => 'unit2@gmail.com',
                    'unit_phone' => '0231774734',
                ],
                [
                    'unit_code' => 'Unit3',
                    'unit_name' => 'Công ty TNHH Lotte',
                    'unit_email' => 'unit3@gmail.com',
                    'unit_phone' => '0238123884',
                ],
                [
                    'unit_code' => 'Unit4',
                    'unit_name' => 'Công ty PepsiCo',
                    'unit_email' => 'unit4@gmail.com',
                    'unit_phone' => '0238123885',
                ],
            ]
        );
    }
}
