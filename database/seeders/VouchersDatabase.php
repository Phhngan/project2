<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VouchersDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Vouchers')->insert(
            [
                [
                    'vou_day' => '2023/06/24',
                    'vou_title' => 'Giảm 10k cho đơn hàng từ 100k',
                    'vou_discount' => 10000,
                    'vou_image' => 'https://github.com/Phhngan/snack_images/blob/master/icon/voucher-icon.png?raw=true',
                    'vou_min' => 100000
                ]

            ]
        );
    }
}
