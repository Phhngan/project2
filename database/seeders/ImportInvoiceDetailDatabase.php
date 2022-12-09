<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportInvoiceDetailDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ImportInvoiceDetail')->insert(
            [
                [
                    'imp_id' => 1,
                    'prd_id' => 1,
                    'imp_quantity' => 10,
                    'imp_price' => 40000,
                    'imp_expiryDate' => '2022/10/25',
                    'prd_status_id' => 3,
                    'imp_quantity-left' => 5,
                ],
                [
                    'imp_id' => 1,
                    'prd_id' => 2,
                    'imp_quantity' => 50,
                    'imp_price' => 20000,
                    'imp_expiryDate' => '2023/05/12',
                    'prd_status_id' => 1,
                    'imp_quantity-left' => 48,
                ],
                [
                    'imp_id' => 2,
                    'prd_id' => 3,
                    'imp_quantity' => 25,
                    'imp_price' => 8000,
                    'imp_expiryDate' => '2023/01/15',
                    'prd_status_id' => 2,
                    'imp_quantity-left' => 10,
                ],
                [
                    'imp_id' => 2,
                    'prd_id' => 4,
                    'imp_quantity' => 40,
                    'imp_price' => 25000,
                    'imp_expiryDate' => '2023/06/17',
                    'prd_status_id' => 1,
                    'imp_quantity-left' => 37,
                ],
                [
                    'imp_id' => 3,
                    'prd_id' => 5,
                    'imp_quantity' => 10,
                    'imp_price' => 12000,
                    'imp_expiryDate' => '2023/05/19',
                    'prd_status_id' => 4,
                    'imp_quantity-left' => 0,
                ],
                [
                    'imp_id' => 3,
                    'prd_id' => 6,
                    'imp_quantity' => 40,
                    'imp_price' => 50000,
                    'imp_expiryDate' => '2023/09/04',
                    'prd_status_id' => 1,
                    'imp_quantity-left' => 38,
                ],
                [
                    'imp_id' => 4,
                    'prd_id' => 1,
                    'imp_quantity' => 20,
                    'imp_price' => 40000,
                    'imp_expiryDate' => '2023/10/25',
                    'prd_status_id' => 1,
                    'imp_quantity-left' => 15,
                ],
                [
                    'imp_id' => 5,
                    'prd_id' => 3,
                    'imp_quantity' => 30,
                    'imp_price' => 8000,
                    'imp_expiryDate' => '2024/01/15',
                    'prd_status_id' => 1,
                    'imp_quantity-left' => 30,
                ],
                [
                    'imp_id' => 6,
                    'prd_id' => 5,
                    'imp_quantity' => 25,
                    'imp_price' => 12000,
                    'imp_expiryDate' => '2023/05/19',
                    'prd_status_id' => 1,
                    'imp_quantity-left' => 20,
                ],
            ]
        );
    }
}
