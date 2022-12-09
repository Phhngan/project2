<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesInvoiceStatusDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('SalesInvoiceStatus')->insert(
            [
                [
                    'sal_status' => 'Đang xác nhận',
                ],
                [
                    'sal_status' => 'Đã xác nhận',
                ],
                [
                    'sal_status' => 'Đang giao hàng',
                ],
                [
                    'sal_status' => 'Giao hàng thành công',
                ],
                [
                    'sal_status' => 'Đã hủy',
                ],
            ]
        );
    }
}
