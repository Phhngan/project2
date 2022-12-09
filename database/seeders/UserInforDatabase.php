<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserInforDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tạo admin
        DB::table('UserInfor')->insert(
            [
                [
                    'use_lastName' => 'Phạm',
                    'use_firstName' => 'Hà Ngân',
                    'use_birth' => '2002/01/02',
                    'use_gender' => 2,
                    'use_email' => 'phamhngan2102@gmail.com',
                    'use_phone' => '0966835587',
                    'pro_id' => 24,
                    'use_district' => 'Hoàng Mai',
                    'use_town' => 'Linh Đàm',
                    'use_detailAddress' => 'Rice City Linh Đàm',
                    'use_password' => Hash::make('123456'),
                    'pos_id' => 2
                ],
                [
                    'use_lastName' => 'Nguyễn Hải',
                    'use_firstName' => 'Nam Dương',
                    'use_birth' => '2002/09/04',
                    'use_gender' => 1,
                    'use_email' => 'namduongbeo49@gmail.com',
                    'use_phone' => '0354427760',
                    'pro_id' => 24,
                    'use_district' => 'Hoàng Mai',
                    'use_town' => 'Đại Kim',
                    'use_detailAddress' => 'CT12B Kim Văn Kim Lũ',
                    'use_password' => Hash::make('123456'),
                    'pos_id' => 3
                ],
                [
                    'use_lastName' => 'Nguyễn Thị',
                    'use_firstName' => 'A',
                    'use_birth' => '2002/12/05',
                    'use_gender' => 2,
                    'use_email' => 'nguyenthia@gmail.com',
                    'use_phone' => '0921345278',
                    'pro_id' => 24,
                    'use_district' => 'Hoàng Mai',
                    'use_town' => 'Đại Kim',
                    'use_detailAddress' => 'Nhà 1 ngõ 1 đường 1',
                    'use_password' => Hash::make('123456'),
                    'pos_id' => 4
                ],
                [
                    'use_lastName' => 'Nguyễn Văn',
                    'use_firstName' => 'B',
                    'use_birth' => '2002/05/12',
                    'use_gender' => 1,
                    'use_email' => 'nguyenvanb@gmail.com',
                    'use_phone' => '0367123283',
                    'pro_id' => 24,
                    'use_district' => 'Hoàng Mai',
                    'use_town' => 'Đại Kim',
                    'use_detailAddress' => 'Nhà 2 ngõ 2 đường 2',
                    'use_password' => Hash::make('123456'),
                    'pos_id' => 5
                ],
                [
                    'use_lastName' => 'Nguyễn Thị',
                    'use_firstName' => 'C',
                    'use_birth' => '2002/07/23',
                    'use_gender' => 2,
                    'use_email' => 'nguyenthic@gmail.com',
                    'use_phone' => '0347273472',
                    'pro_id' => 26,
                    'use_district' => 'Tứ Kỳ',
                    'use_town' => 'Hưng Đạo',
                    'use_detailAddress' => 'Thị tứ Hưng Đạo',
                    'use_password' => Hash::make('123456'),
                    'pos_id' => 1
                ],
                [
                    'use_lastName' => 'Nguyễn Văn',
                    'use_firstName' => 'D',
                    'use_birth' => '2002-04-19',
                    'use_gender' => 1,
                    'use_email' => 'nguyenvand@gmail.com',
                    'use_phone' => '0237123721',
                    'pro_id' => 15,
                    'use_district' => 'Hòa Vang',
                    'use_town' => 'Hòa Ninh',
                    'use_detailAddress' => 'Nhà 3 ngõ 3 đường 3',
                    'use_password' => Hash::make('123456'),
                    'pos_id' => 1
                ],
                [
                    'use_lastName' => 'Nguyễn Thị',
                    'use_firstName' => 'E',
                    'use_birth' => '2002-02-26',
                    'use_gender' => 2,
                    'use_email' => 'nguyenthie@gmail.com',
                    'use_phone' => '0346278319',
                    'pro_id' => 58,
                    'use_district' => 'Quận 1',
                    'use_town' => 'Bến Thành',
                    'use_detailAddress' => 'Nhà 4 ngõ 4 đường 4',
                    'use_password' => Hash::make('123456'),
                    'pos_id' => 1
                ]
            ]
        );
    }
}
