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
                    'imp_note' => 'Nguyễn Thái Hưng',
                ],
                [
                    'unit_id' => 2,
                    'use_id' => 2,
                    'imp_date' => '2022/01/06',
                    'imp_total' => 2880000,
                    'imp_note' => 'Trần Minh Trí',
                ],
                [
                    'unit_id' => 3,
                    'use_id' => 2,
                    'imp_date' => '2022/01/07',
                    'imp_total' => 2660000,
                    'imp_note' => 'Trần Minh Trí',
                ],
                [
                    'unit_id' => 1,
                    'use_id' => 2,
                    'imp_date' => '2023/01/05',
                    'imp_total' => 2000000,
                    'imp_note' => 'Nguyễn Thái Hưng',
                ],
                [
                    'unit_id' => 2,
                    'use_id' => 2,
                    'imp_date' => '2023/01/06',
                    'imp_total' => 1400000,
                    'imp_note' => 'Trần Minh Trí',
                ],
                [
                    'unit_id' => 3,
                    'use_id' => 2,
                    'imp_date' => '2023/01/07',
                    'imp_total' => 1420000,
                    'imp_note' => 'Trần Minh Trí',
                ],
                [
                    'unit_id' => 5,
                    'use_id' => 2,
                    'imp_date' => '2023/07/07',
                    'imp_total' => 2400000,
                    'imp_note' => 'Phạm Đức Thiện',
                ],
                [
                    'unit_id' => 6,
                    'use_id' => 2,
                    'imp_date' => '2023/07/07',
                    'imp_total' => 1520000,
                    'imp_note' => 'Phạm Đức Thiện',
                ],
                [
                    'unit_id' => 1,
                    'use_id' => 2,
                    'imp_date' => '2023/07/05',
                    'imp_total' => 5120000,
                    'imp_note' => 'Nguyễn Thái Hưng',
                ],
                [
                    'unit_id' => 6,
                    'use_id' => 2,
                    'imp_date' => '2023/07/05',
                    'imp_total' => 5750000,
                    'imp_note' => 'Nguyễn Thái Hưng',
                ],
                [
                    'unit_id' => 6,
                    'use_id' => 5,
                    'imp_date' => '2023/07/20',
                    'imp_total' => 2200000,
                    'imp_note' => 'Nguyễn Thái Nam',
                ],
                [
                    'unit_id' => 6,
                    'use_id' => 5,
                    'imp_date' => '2023/07/21',
                    'imp_total' => 2500000,
                    'imp_note' => 'Nguyễn Thái Nam',
                ],
                [
                    'unit_id' => 6,
                    'use_id' => 2,
                    'imp_date' => '2023/07/24',
                    'imp_total' => 3600000,
                    'imp_note' => 'Nguyễn Thái Hưng',
                ],
            ]
        );
    }
}
