<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipsDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Ships')->insert(
            [
                [
                    'ship_price' => 0,
                    'ship_extra' => 0,
                    'ship_time' => 1
                ],
                [
                    'ship_price' => 22000,
                    'ship_extra' => 3500,
                    'ship_time' => 2
                ],
                [
                    'ship_price' => 22000,
                    'ship_extra' => 5500,
                    'ship_time' => 4
                ],
                [
                    'ship_price' => 22000,
                    'ship_extra' => 5500,
                    'ship_time' => 5
                ]
            ]
        );
    }
}
