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
                    'imp_date' => '2022/08/01',
                    'imp_total' => 1400000,
                ],
                [
                    'unit_id' => 2,
                    'use_id' => 2,
                    'imp_date' => '2022/08/02',
                    'imp_total' => 1200000,
                ],
                [
                    'unit_id' => 3,
                    'use_id' => 2,
                    'imp_date' => '2022/08/03',
                    'imp_total' => 2120000,
                ],
                [
                    'unit_id' => 1,
                    'use_id' => 2,
                    'imp_date' => '2022/11/01',
                    'imp_total' => 800000,
                ],
                [
                    'unit_id' => 2,
                    'use_id' => 2,
                    'imp_date' => '2022/11/02',
                    'imp_total' => 240000,
                ],
                [
                    'unit_id' => 3,
                    'use_id' => 2,
                    'imp_date' => '2022/11/03',
                    'imp_total' => 300000,
                ],
            ]
        );
    }
}
