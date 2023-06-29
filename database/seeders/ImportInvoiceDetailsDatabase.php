<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportInvoiceDetailsDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ImportInvoiceDetails')->insert(
            [
                [
                    'imp_id' => 1,
                    'prd_id' => 1,
                    'imp_quantity' => 10,
                    'imp_price' => 40000,
                    'imp_expiryDate' => '2022/12/01',
                    'prd_status_id' => 3,
                    'imp_quantity_left' => 5,
                ],
                [
                    'imp_id' => 1,
                    'prd_id' => 2,
                    'imp_quantity' => 10,
                    'imp_price' => 20000,
                    'imp_expiryDate' => '2022/12/02',
                    'prd_status_id' => 3,
                    'imp_quantity_left' => 5,
                ],
                [
                    'imp_id' => 1,
                    'prd_id' => 7,
                    'imp_quantity' => 50,
                    'imp_price' => 10000,
                    'imp_expiryDate' => '2023/12/07',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 45,
                ],
                [
                    'imp_id' => 1,
                    'prd_id' => 8,
                    'imp_quantity' => 45,
                    'imp_price' => 18000,
                    'imp_expiryDate' => '2023/12/08',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 40,
                ],
                [
                    'imp_id' => 2,
                    'prd_id' => 3,
                    'imp_quantity' => 10,
                    'imp_price' => 8000,
                    'imp_expiryDate' => '2022/12/03',
                    'prd_status_id' => 3,
                    'imp_quantity_left' => 5,
                ],
                [
                    'imp_id' => 2,
                    'prd_id' => 4,
                    'imp_quantity' => 10,
                    'imp_price' => 25000,
                    'imp_expiryDate' => '2022/12/04',
                    'prd_status_id' => 3,
                    'imp_quantity_left' => 5,
                ],
                [
                    'imp_id' => 2,
                    'prd_id' => 12,
                    'imp_quantity' => 25,
                    'imp_price' => 50000,
                    'imp_expiryDate' => '2023/12/12',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 20,
                ],
                [
                    'imp_id' => 2,
                    'prd_id' => 13,
                    'imp_quantity' => 20,
                    'imp_price' => 65000,
                    'imp_expiryDate' => '2023/12/13',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 15,
                ],
                [
                    'imp_id' => 3,
                    'prd_id' => 5,
                    'imp_quantity' => 5,
                    'imp_price' => 12000,
                    'imp_expiryDate' => '2022/12/05',
                    'prd_status_id' => 4,
                    'imp_quantity_left' => 0,
                ],
                [
                    'imp_id' => 3,
                    'prd_id' => 6,
                    'imp_quantity' => 5,
                    'imp_price' => 50000,
                    'imp_expiryDate' => '2022/12/06',
                    'prd_status_id' => 4,
                    'imp_quantity_left' => 0,
                ],
                [
                    'imp_id' => 3,
                    'prd_id' => 9,
                    'imp_quantity' => 15,
                    'imp_price' => 90000,
                    'imp_expiryDate' => '2023/12/09',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 10,
                ],
                [
                    'imp_id' => 3,
                    'prd_id' => 10,
                    'imp_quantity' => 50,
                    'imp_price' => 10000,
                    'imp_expiryDate' => '2023/12/10',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 45,
                ],
                [
                    'imp_id' => 3,
                    'prd_id' => 11,
                    'imp_quantity' => 50,
                    'imp_price' => 10000,
                    'imp_expiryDate' => '2023/12/11',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 45,
                ],
                [
                    'imp_id' => 4,
                    'prd_id' => 1,
                    'imp_quantity' => 30,
                    'imp_price' => 40000,
                    'imp_expiryDate' => '2023/12/01',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 25,
                ],
                [
                    'imp_id' => 4,
                    'prd_id' => 2,
                    'imp_quantity' => 40,
                    'imp_price' => 20000,
                    'imp_expiryDate' => '2023/12/02',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 35,
                ],
                [
                    'imp_id' => 5,
                    'prd_id' => 3,
                    'imp_quantity' => 50,
                    'imp_price' => 8000,
                    'imp_expiryDate' => '2023/12/03',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 45,
                ],
                [
                    'imp_id' => 5,
                    'prd_id' => 4,
                    'imp_quantity' => 40,
                    'imp_price' => 25000,
                    'imp_expiryDate' => '2023/12/04',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 35,
                ],
                [
                    'imp_id' => 6,
                    'prd_id' => 5,
                    'imp_quantity' => 35,
                    'imp_price' => 12000,
                    'imp_expiryDate' => '2023/12/05',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 30,
                ],
                [
                    'imp_id' => 6,
                    'prd_id' => 6,
                    'imp_quantity' => 20,
                    'imp_price' => 50000,
                    'imp_expiryDate' => '2023/12/06',
                    'prd_status_id' => 1,
                    'imp_quantity_left' => 20,
                ],
            ]
        );
    }
}
