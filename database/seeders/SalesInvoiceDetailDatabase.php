<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesInvoiceDetailDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('SalesInvoiceDetail')->insert(
            [
                [
                    'sal_id' => 1,
                    'prd_id' => 1,
                    'sal_quantity' => 5,
                    'sal_price' => 95000,
                ],
                [
                    'sal_id' => 1,
                    'prd_id' => 2,
                    'sal_quantity' => 2,
                    'sal_price' => 50000,
                ],
                [
                    'sal_id' => 2,
                    'prd_id' => 3,
                    'sal_quantity' => 5,
                    'sal_price' => 20000,
                ],
                [
                    'sal_id' => 2,
                    'prd_id' => 4,
                    'sal_quantity' => 3,
                    'sal_price' => 60000,
                ],
                [
                    'sal_id' => 3,
                    'prd_id' => 5,
                    'sal_quantity' => 10,
                    'sal_price' => 30000,
                ],
                [
                    'sal_id' => 3,
                    'prd_id' => 6,
                    'sal_quantity' => 2,
                    'sal_price' => 96000,
                ],
                [
                    'sal_id' => 4,
                    'prd_id' => 1,
                    'sal_quantity' => 5,
                    'sal_price' => 95000,
                ],
                [
                    'sal_id' => 5,
                    'prd_id' => 3,
                    'sal_quantity' => 10,
                    'sal_price' => 20000,
                ],
                [
                    'sal_id' => 6,
                    'prd_id' => 5,
                    'sal_quantity' => 5,
                    'sal_price' => 30000,
                ],
            ]
        );
    }
}
