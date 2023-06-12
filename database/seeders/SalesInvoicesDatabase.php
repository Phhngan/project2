<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesInvoicesDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('SalesInvoices')->insert(
            [
                [
                    'use_id' => 5,
                    'sal_date' => '2022/10/01',
                    'sal_total' => 600850,
                    'ship_id' => 2,
                    'sal_detailAddress' => 'Thị tứ Hưng Đạo - Hưng Đạo - Tứ Kỳ - Hải Dương',
                    'sal_status_id' => 1,
                ],
                [
                    'use_id' => 6,
                    'sal_date' => '2022/10/02',
                    'sal_total' => 302000,
                    'ship_id' => 3,
                    'sal_detailAddress' => 'Nhà 3 ngõ 3 đường 3 - Hòa Ninh - Hòa Vang - Đà Nẵng',
                    'sal_status_id' => 2,
                ],
                [
                    'use_id' => 7,
                    'sal_date' => '2022/10/03',
                    'sal_total' => 527200,
                    'ship_id' => 4,
                    'sal_detailAddress' => 'Nhà 4 ngõ 4 đường 4 - Bến Thành - Quận 1 - Hồ Chí Minh',
                    'sal_status_id' => 3,
                ],
                [
                    'use_id' => 5,
                    'sal_date' => '2022/11/04',
                    'sal_total' => 498750,
                    'ship_id' => 2,
                    'sal_detailAddress' => 'Thị tứ Hưng Đạo - Hưng Đạo - Tứ Kỳ - Hải Dương',
                    'sal_status_id' => 4,
                ],
                [
                    'use_id' => 6,
                    'sal_date' => '2022/11/05',
                    'sal_total' => 222000,
                    'ship_id' => 3,
                    'sal_detailAddress' => 'Nhà 3 ngõ 3 đường 3 - Hòa Ninh - Hòa Vang - Đà Nẵng',
                    'sal_status_id' => 5,
                ],
                [
                    'use_id' => 7,
                    'sal_date' => '2022/11/06',
                    'sal_total' => 172000,
                    'ship_id' => 4,
                    'sal_detailAddress' => 'Nhà 4 ngõ 4 đường 4 - Bến Thành - Quận 1 - Hồ Chí Minh',
                    'sal_status_id' => 1,
                ],
            ]
        );
    }
}
