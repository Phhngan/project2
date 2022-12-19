<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Regions')->insert(
            [
                [
                    'reg_name' => 'Hà Nội',
                    'reg_ship' => 0,
                    'reg_ship_extra' => 0,
                    'reg_ship_time' => 1
                ],
                [
                    'reg_name' => 'Miền Bắc',
                    'reg_ship' => 22000,
                    'reg_ship_extra' => 3500,
                    'reg_ship_time' => 2
                ],
                [
                    'reg_name' => 'Miền Trung',
                    'reg_ship' => 22000,
                    'reg_ship_extra' => 5500,
                    'reg_ship_time' => 4
                ],
                [
                    'reg_name' => 'Miền Nam',
                    'reg_ship' => 22000,
                    'reg_ship_extra' => 5500,
                    'reg_ship_time' => 5
                ]
            ]
        );
    }
}
