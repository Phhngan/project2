<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionTypeDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('PositionType')->insert(
            [
                [
                    'pos_name' => 'Khách hàng'
                ],
                [
                    'pos_name' => 'Quản lý tổng'
                ],
                [
                    'pos_name' => 'Quản lý kho'
                ],
                [
                    'pos_name' => 'Quản lý đơn hàng'
                ],
                [
                    'pos_name' => 'Người giao hàng'
                ]
            ]
        );
    }
}
