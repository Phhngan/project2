<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Images')->insert(
            [
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP1/doman_khoga.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 1,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP2/doman_comchay.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 2,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP3/dongot_pocky.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 3,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP4/dongot_banhgau.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 4,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP5/drink_meco.jpg?raw=true',
                    'img_role' => 1,
                    'prd_id' => 5,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP6/drink_coca.jpg?raw=true',
                    'img_role' => 1,
                    'prd_id' => 6,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP7/doman_mi_ga_cay2.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 7,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP8/doman_snack_xoan.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 8,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP10/drink_sua_dua_gang1.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 9,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP13/drink_soda_nho1.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 10,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP14/drink_soda_cam.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 11,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP18/dongot_chocopie_nho.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 12,
                ],
                [
                    'img_url' => 'https://github.com/Phhngan/snack_images/blob/master/san-pham/SP19/dongot_chocopie_chuoi.png?raw=true',
                    'img_role' => 1,
                    'prd_id' => 13,
                ],
            ]
        );
    }
}
