<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Comments')->insert(
            [
                [
                    'use_id' => 5,
                    'prd_id' => 1,
                    'com_rate' => 5,
                    'sal_id' => 1,
                    'com_detail' => 'Rất ngon miệng 😋 khô gà vừa thơm vừa miệng. Nên mua',
                    'com_date' => '2022/01/20',
                ],
                [
                    'use_id' => 5,
                    'prd_id' => 4,
                    'com_rate' => 5,
                    'sal_id' => 4,
                    'com_detail' => 'Rất ngon miệng',
                    'com_date' => '2022/04/05',
                ],
                [
                    'use_id' => 6,
                    'prd_id' => 1,
                    'com_rate' => 4,
                    'sal_id' => 14,
                    'com_detail' => 'Ngon, hàng chất lượng nhg hơi mặn',
                    'com_date' => '2022/10/05',
                ],
            ]
        );
    }
}
