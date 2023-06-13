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
                    'vou_type' => 1,
                    'vou_day' => '2023/04/09',
                    'vou_title' => 'Giảm 10k cho đơn hàng từ 100k',
                    'vou_discount' => 10000,
                    'vou_image' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP3/dongot_pocky.png?raw=true',
                    'vou_detail' => 'Chỉ áp dụng cho đơn hàng mua đồ mặn có tổng giá trị đơn hàng trên 100.000 VND',
                    'vou_min' => 100000
                ]

            ]
        );
    }
}
