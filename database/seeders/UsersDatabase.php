<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tạo admin
        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Phạm',
                'name' => 'Hà Ngân',
                'use_gender' => 2,
                'email' => 'phamhngan2102@gmail.com',
                'use_phone' => '0966835587',
                'use_detailAddress' => 'Rice City Linh Đàm - Linh Đàm - Hoàng Mai - Hà Nội',
                'password' => Hash::make('123456'),
                'pos_id' => 2,
                'use_gold' => 0
            ]
        );

        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Nguyễn Hải',
                'name' => 'Nam Dương',
                'use_gender' => 1,
                'email' => 'namduongbeo49@gmail.com',
                'use_phone' => '0354427760',
                'use_detailAddress' => 'CT12B Kim Văn Kim Lũ - Đại Kim - Hoàng Mai - Hà Nội',
                'password' => Hash::make('123456'),
                'pos_id' => 3,
                'use_gold' => 0
            ]
        );

        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Nguyễn Thị',
                'name' => 'A',
                'use_gender' => 2,
                'email' => 'nguyenthia@gmail.com',
                'use_phone' => '0921345278',
                'use_detailAddress' => 'Nhà 1 ngõ 1 đường 1 - Đại Kim - Hoàng Mai - Hà Nội',
                'password' => Hash::make('123456'),
                'pos_id' => 4,
                'use_gold' => 0
            ]
        );

        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Nguyễn Văn',
                'name' => 'B',
                'use_gender' => 1,
                'email' => 'nguyenvanb@gmail.com',
                'use_phone' => '0367123283',
                'use_detailAddress' => 'Nhà 2 ngõ 2 đường 2 - Đại Kim - Hoàng Mai - Hà Nội',
                'password' => Hash::make('123456'),
                'pos_id' => 5,
                'use_gold' => 0
            ]
        );

        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Nguyễn Thị',
                'name' => 'C',
                'use_gender' => 2,
                'email' => 'nguyenthic@gmail.com',
                'use_phone' => '0347273472',
                'use_detailAddress' => 'Thị tứ Hưng Đạo - Hưng Đạo - Tứ Kỳ - Hải Dương',
                'password' => Hash::make('123456'),
                'pos_id' => 1,
                'use_gold' => 1000
            ]
        );

        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Nguyễn Văn',
                'name' => 'D',
                'use_gender' => 1,
                'email' => 'nguyenvand@gmail.com',
                'use_phone' => '0237123721',
                'use_detailAddress' => 'Nhà 3 ngõ 3 đường 3 - Hòa Ninh - Hòa Vang - Đà Nẵng',
                'password' => Hash::make('123456'),
                'pos_id' => 1,
                'use_gold' => 1000
            ]
        );

        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Nguyễn Thị',
                'name' => 'E',
                'use_gender' => 2,
                'email' => 'nguyenthie@gmail.com',
                'use_phone' => '0346278319',
                'use_detailAddress' => 'Nhà 4 ngõ 4 đường 4 - Bến Thành - Quận 1 - Hồ Chí Minh',
                'password' => Hash::make('123456'),
                'pos_id' => 1,
                'use_gold' => 1000
            ]
        );

        \App\Models\User::factory()->create(
            [
                'use_lastName' => 'Nguyễn Văn',
                'name' => 'F',
                'use_gender' => 1,
                'email' => 'nguyenvanf@gmail.com',
                'use_phone' => '0367123283',
                'use_detailAddress' => 'Nhà 5 ngõ 5 đường 5 - Đại Kim - Hoàng Mai - Hà Nội',
                'password' => Hash::make('123456'),
                'pos_id' => 6,
                'use_gold' => 0
            ]
        );
    }
}
