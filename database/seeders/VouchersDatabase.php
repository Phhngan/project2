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
                    'vou_image' => 'public/voucher1.png',
                    'vou_min' => 100000
                ],
                [
                    'vou_day' => '2023/07/24',
                    'vou_title' => 'Giảm 10k cho đơn hàng từ 100k',
                    'vou_discount' => 10000,
                    'vou_image' => 'public/voucher1.png',
                    'vou_min' => 100000
                ],
                [
                    'vou_day' => '2023/07/27',
                    'vou_title' => 'Giảm 10k cho đơn hàng từ 100k',
                    'vou_discount' => 10000,
                    'vou_image' => 'public/voucher1.png',
                    'vou_min' => 100000
                ],
                [
                    'vou_day' => '2023/07/28',
                    'vou_title' => 'Giảm 10k cho đơn hàng từ 100k',
                    'vou_discount' => 10000,
                    'vou_image' => 'public/voucher1.png',
                    'vou_min' => 100000
                ],
                [
                    'vou_day' => '2023/08/30',
                    'vou_title' => 'Giảm 35k cho đơn hàng từ 300k',
                    'vou_discount' => 35000,
                    'vou_image' => 'public/voucher1.png',
                    'vou_min' => 300000
                ],
            ]
        );
    }
}
