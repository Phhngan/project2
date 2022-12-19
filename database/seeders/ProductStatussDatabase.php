<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStatussDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ProductStatuss')->insert(
            [
                [
                    'prd_status' => 'Còn hạn',
                ],
                [
                    'prd_status' => 'Gần hết hạn',
                ],
                [
                    'prd_status' => 'Hết hạn',
                ],
                [
                    'prd_status' => 'Đã bán hết',
                ],
                [
                    'prd_status' => 'Không còn sản xuất',
                ],
            ]
        );
    }
}
