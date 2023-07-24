<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesInvoiceDetailsDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('SalesInvoiceDetails')->insert(
            [
                [
                    'sal_id' => 1,
                    'prd_id' => 1,
                    'sal_quantity' => 5,
                    'sal_price' => 95000,
                    'imp_price' => 40000,
                ],
                [
                    'sal_id' => 2,
                    'prd_id' => 2,
                    'sal_quantity' => 5,
                    'sal_price' => 50000,
                    'imp_price' => 20000,
                ],
                [
                    'sal_id' => 3,
                    'prd_id' => 3,
                    'sal_quantity' => 5,
                    'sal_price' => 20000,
                    'imp_price' => 8000,
                ],
                [
                    'sal_id' => 4,
                    'prd_id' => 4,
                    'sal_quantity' => 5,
                    'sal_price' => 60000,
                    'imp_price' => 25000,
                ],
                [
                    'sal_id' => 5,
                    'prd_id' => 5,
                    'sal_quantity' => 5,
                    'sal_price' => 30000,
                    'imp_price' => 12000,
                ],
                [
                    'sal_id' => 6,
                    'prd_id' => 6,
                    'sal_quantity' => 5,
                    'sal_price' => 96000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 7,
                    'prd_id' => 7,
                    'sal_quantity' => 5,
                    'sal_price' => 20000,
                    'imp_price' => 10000,
                ],
                [
                    'sal_id' => 8,
                    'prd_id' => 8,
                    'sal_quantity' => 5,
                    'sal_price' => 31000,
                    'imp_price' => 18000,
                ],
                [
                    'sal_id' => 9,
                    'prd_id' => 9,
                    'sal_quantity' => 5,
                    'sal_price' => 135000,
                    'imp_price' => 90000,
                ],
                [
                    'sal_id' => 10,
                    'prd_id' => 10,
                    'sal_quantity' => 5,
                    'sal_price' => 20000,
                    'imp_price' => 10000,
                ],
                [
                    'sal_id' => 11,
                    'prd_id' => 11,
                    'sal_quantity' => 5,
                    'sal_price' => 20000,
                    'imp_price' => 10000,
                ],
                [
                    'sal_id' => 12,
                    'prd_id' => 12,
                    'sal_quantity' => 5,
                    'sal_price' => 85000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 13,
                    'prd_id' => 13,
                    'sal_quantity' => 5,
                    'sal_price' => 105000,
                    'imp_price' => 65000,
                ],
                [
                    'sal_id' => 14,
                    'prd_id' => 1,
                    'sal_quantity' => 5,
                    'sal_price' => 95000,
                    'imp_price' => 40000,
                ],
                [
                    'sal_id' => 15,
                    'prd_id' => 2,
                    'sal_quantity' => 5,
                    'sal_price' => 50000,
                    'imp_price' => 20000,
                ],
                [
                    'sal_id' => 16,
                    'prd_id' => 3,
                    'sal_quantity' => 5,
                    'sal_price' => 20000,
                    'imp_price' => 8000,
                ],
                [
                    'sal_id' => 17,
                    'prd_id' => 4,
                    'sal_quantity' => 5,
                    'sal_price' => 60000,
                    'imp_price' => 25000,
                ],
                [
                    'sal_id' => 18,
                    'prd_id' => 5,
                    'sal_quantity' => 5,
                    'sal_price' => 30000,
                    'imp_price' => 12000,
                ],
                [
                    'sal_id' => 19,
                    'prd_id' => 17,
                    'sal_quantity' => 5,
                    'sal_price' => 75000,
                    'imp_price' => 35000,
                ],
                [
                    'sal_id' => 19,
                    'prd_id' => 16,
                    'sal_quantity' => 5,
                    'sal_price' => 52000,
                    'imp_price' => 25000,
                ],
                [
                    'sal_id' => 20,
                    'prd_id' => 10,
                    'sal_quantity' => 5,
                    'sal_price' => 20000,
                    'imp_price' => 9000,
                ],
                [
                    'sal_id' => 21,
                    'prd_id' => 16,
                    'sal_quantity' => 10,
                    'sal_price' => 52000,
                    'imp_price' => 25000,
                ],
                [
                    'sal_id' => 22,
                    'prd_id' => 5,
                    'sal_quantity' => 10,
                    'sal_price' => 30000,
                    'imp_price' => 12000,
                ],
                [
                    'sal_id' => 23,
                    'prd_id' => 14,
                    'sal_quantity' => 1,
                    'sal_price' => 105000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 24,
                    'prd_id' => 14,
                    'sal_quantity' => 8,
                    'sal_price' => 105000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 25,
                    'prd_id' => 17,
                    'sal_quantity' => 10,
                    'sal_price' => 75000,
                    'imp_price' => 35000,
                ],
                [
                    'sal_id' => 26,
                    'prd_id' => 12,
                    'sal_quantity' => 10,
                    'sal_price' => 85000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 27,
                    'prd_id' => 9,
                    'sal_quantity' => 8,
                    'sal_price' => 135000,
                    'imp_price' => 90000,
                ],
                [
                    'sal_id' => 28,
                    'prd_id' => 6,
                    'sal_quantity' => 10,
                    'sal_price' => 96000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 29,
                    'prd_id' => 18,
                    'sal_quantity' => 5,
                    'sal_price' => 125000,
                    'imp_price' => 55000,
                ],
                [
                    'sal_id' => 29,
                    'prd_id' => 19,
                    'sal_quantity' => 2,
                    'sal_price' => 120000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 30,
                    'prd_id' => 19,
                    'sal_quantity' => 2,
                    'sal_price' => 120000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 30,
                    'prd_id' => 20,
                    'sal_quantity' => 2,
                    'sal_price' => 350000,
                    'imp_price' => 120000,
                ],
                [
                    'sal_id' => 30,
                    'prd_id' => 17,
                    'sal_quantity' => 10,
                    'sal_price' => 75000,
                    'imp_price' => 35000,
                ],
                [
                    'sal_id' => 31,
                    'prd_id' => 20,
                    'sal_quantity' => 2,
                    'sal_price' => 350000,
                    'imp_price' => 120000,
                ],
                [
                    'sal_id' => 32,
                    'prd_id' => 19,
                    'sal_quantity' => 2,
                    'sal_price' => 120000,
                    'imp_price' => 50000,
                ],
                [
                    'sal_id' => 33,
                    'prd_id' => 10,
                    'sal_quantity' => 2,
                    'sal_price' => 20000,
                    'imp_price' => 10000,
                ],
            ]
        );
    }
}
