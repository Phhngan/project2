<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypesDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ProductTypes')->insert(
            [
                [
                    'prd_type' => 'Đồ mặn'
                ],
                [
                    'prd_type' => 'Đồ ngọt'
                ],
                [
                    'prd_type' => 'Đồ uống'
                ]
            ]
        );
    }
}
