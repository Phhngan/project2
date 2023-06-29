<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportInvoicesDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ImportInvoices')->insert(
            [
                [
                    'unit_id' => 1,
                    'use_id' => 2,
                    'imp_date' => '2022/01/05',
                    'imp_total' => 1910000,
                ],
                [
                    'unit_id' => 2,
                    'use_id' => 2,
                    'imp_date' => '2022/01/06',
                    'imp_total' => 2880000,
                ],
                [
                    'unit_id' => 3,
                    'use_id' => 2,
                    'imp_date' => '2022/01/07',
                    'imp_total' => 2660000,
                ],
                [
                    'unit_id' => 1,
                    'use_id' => 2,
                    'imp_date' => '2023/01/05',
                    'imp_total' => 2000000,
                ],
                [
                    'unit_id' => 2,
                    'use_id' => 2,
                    'imp_date' => '2023/01/06',
                    'imp_total' => 1400000,
                ],
                [
                    'unit_id' => 3,
                    'use_id' => 2,
                    'imp_date' => '2023/01/07',
                    'imp_total' => 1420000,
                ],
            ]
        );
    }
}
