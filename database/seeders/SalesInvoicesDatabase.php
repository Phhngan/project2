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
                    'pro_id' => 26,
                    'sal_district' => 'Tứ Kỳ',
                    'sal_town' => 'Hưng Đạo',
                    'sal_detailAddress' => 'Thị tứ Hưng Đạo',
                    'sal_status_id' => 1,
                ],
                [
                    'use_id' => 6,
                    'sal_date' => '2022/10/02',
                    'sal_total' => 302000,
                    'pro_id' => 15,
                    'sal_district' => 'Hòa Vang',
                    'sal_town' => 'Hòa Ninh',
                    'sal_detailAddress' => 'Nhà 3 ngõ 3 đường 3',
                    'sal_status_id' => 2,
                ],
                [
                    'use_id' => 7,
                    'sal_date' => '2022/10/03',
                    'sal_total' => 527200,
                    'pro_id' => 58,
                    'sal_district' => 'Quận 1',
                    'sal_town' => 'Bến Thành',
                    'sal_detailAddress' => 'Nhà 4 ngõ 4 đường 4',
                    'sal_status_id' => 3,
                ],
                [
                    'use_id' => 5,
                    'sal_date' => '2022/11/04',
                    'sal_total' => 498750,
                    'pro_id' => 26,
                    'sal_district' => 'Tứ Kỳ',
                    'sal_town' => 'Hưng Đạo',
                    'sal_detailAddress' => 'Thị tứ Hưng Đạo',
                    'sal_status_id' => 4,
                ],
                [
                    'use_id' => 6,
                    'sal_date' => '2022/11/05',
                    'sal_total' => 222000,
                    'pro_id' => 15,
                    'sal_district' => 'Hòa Vang',
                    'sal_town' => 'Hòa Ninh',
                    'sal_detailAddress' => 'Nhà 3 ngõ 3 đường 3',
                    'sal_status_id' => 5,
                ],
                [
                    'use_id' => 7,
                    'sal_date' => '2022/11/06',
                    'sal_total' => 172000,
                    'pro_id' => 58,
                    'sal_district' => 'Quận 1',
                    'sal_town' => 'Bến Thành',
                    'sal_detailAddress' => 'Nhà 4 ngõ 4 đường 4',
                    'sal_status_id' => 1,
                ],
            ]
        );
    }
}
