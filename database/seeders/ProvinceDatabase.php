<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Province')->insert(
            [
                [   //1
                    'pro_name' => 'An Giang',
                    'reg_id' => 4
                ],
                [   //2
                    'pro_name' => 'Bà Rịa Vũng Tàu',
                    'reg_id' => 4
                ],
                [   //3
                    'pro_name' => 'Bắc Giang',
                    'reg_id' => 2
                ],
                [   //4
                    'pro_name' => 'Bắc Kạn',
                    'reg_id' => 2
                ],
                [   //5
                    'pro_name' => 'Bạc Liêu',
                    'reg_id' => 4
                ],
                [   //6
                    'pro_name' => 'Bắc Ninh',
                    'reg_id' => 2
                ],
                [   //7
                    'pro_name' => 'Bến Tre',
                    'reg_id' => 4
                ],
                [   //8
                    'pro_name' => 'Bình Định',
                    'reg_id' => 3
                ],
                [   //9
                    'pro_name' => 'Bình Dương',
                    'reg_id' => 4
                ],
                [   //10
                    'pro_name' => 'Bình Phước',
                    'reg_id' => 4
                ],
                [   //11
                    'pro_name' => 'Bình Thuận',
                    'reg_id' => 3
                ],
                [   //12
                    'pro_name' => 'Cà Mau',
                    'reg_id' => 4
                ],
                [   //13
                    'pro_name' => 'Cần Thơ',
                    'reg_id' => 4
                ],
                [   //14
                    'pro_name' => 'Cao Bằng',
                    'reg_id' => 2
                ],
                [   //15
                    'pro_name' => 'Đà Nẵng',
                    'reg_id' => 3
                ],
                [   //16
                    'pro_name' => 'Đắk Lắk',
                    'reg_id' => 3
                ],
                [   //17
                    'pro_name' => 'Đắk Nông',
                    'reg_id' => 3
                ],
                [   //18
                    'pro_name' => 'Điện Biên',
                    'reg_id' => 2
                ],
                [   //19
                    'pro_name' => 'Đồng Nai',
                    'reg_id' => 4
                ],
                [   //20
                    'pro_name' => 'Đồng Tháp',
                    'reg_id' => 4
                ],
                [   //21
                    'pro_name' => 'Gia Lai',
                    'reg_id' => 3
                ],
                [   //22
                    'pro_name' => 'Hà Giang',
                    'reg_id' => 2
                ],
                [   //23
                    'pro_name' => 'Hà Nam',
                    'reg_id' => 2
                ],
                [   //24
                    'pro_name' => 'Hà Nội',
                    'reg_id' => 1
                ],
                [   //25
                    'pro_name' => 'Hà Tĩnh',
                    'reg_id' => 3
                ],
                [   //26
                    'pro_name' => 'Hải Dương',
                    'reg_id' => 2
                ],
                [   //27
                    'pro_name' => 'Hải Phòng',
                    'reg_id' => 2
                ],
                [   //28
                    'pro_name' => 'Hậu Giang',
                    'reg_id' => 4
                ],
                [   //29
                    'pro_name' => 'Hòa Bình',
                    'reg_id' => 2
                ],
                [   //30
                    'pro_name' => 'Hưng Yên',
                    'reg_id' => 2
                ],
                [   //31
                    'pro_name' => 'Khánh Hòa',
                    'reg_id' => 3
                ],
                [   //32
                    'pro_name' => 'Kiên Giang',
                    'reg_id' => 4
                ],
                [   //33
                    'pro_name' => 'Kon Tum',
                    'reg_id' => 3
                ],
                [   //34
                    'pro_name' => 'Lai Châu',
                    'reg_id' => 2
                ],
                [   //35
                    'pro_name' => 'Lâm Đồng',
                    'reg_id' => 3
                ],
                [   //36
                    'pro_name' => 'Lạng Sơn',
                    'reg_id' => 2
                ],
                [   //37
                    'pro_name' => 'Lào Cai',
                    'reg_id' => 2
                ],
                [   //38
                    'pro_name' => 'Long An',
                    'reg_id' => 4
                ],
                [   //39
                    'pro_name' => 'Nam Định',
                    'reg_id' => 2
                ],
                [   //40
                    'pro_name' => 'Nghệ An',
                    'reg_id' => 3
                ],
                [   //41
                    'pro_name' => 'Ninh Bình',
                    'reg_id' => 2
                ],
                [   //42
                    'pro_name' => 'Ninh Thuận',
                    'reg_id' => 3
                ],
                [   //43
                    'pro_name' => 'Phú Thọ',
                    'reg_id' => 2
                ],
                [   //44
                    'pro_name' => 'Phú Yên',
                    'reg_id' => 3
                ],
                [   //45
                    'pro_name' => 'Quảng Bình',
                    'reg_id' => 3
                ],
                [   //46
                    'pro_name' => 'Quảng Nam',
                    'reg_id' => 3
                ],
                [   //47
                    'pro_name' => 'Quảng Ngãi',
                    'reg_id' => 3
                ],
                [   //48
                    'pro_name' => 'Quảng Ninh',
                    'reg_id' => 2
                ],
                [   //49
                    'pro_name' => 'Quảng Trị',
                    'reg_id' => 3
                ],
                [   //50
                    'pro_name' => 'Sóc Trăng',
                    'reg_id' => 4
                ],
                [   //51
                    'pro_name' => 'Sơn La',
                    'reg_id' => 2
                ],
                [   //52
                    'pro_name' => 'Tây Ninh',
                    'reg_id' => 4
                ],
                [   //53
                    'pro_name' => 'Thái Bình',
                    'reg_id' => 2
                ],
                [   //54
                    'pro_name' => 'Thái Nguyên',
                    'reg_id' => 2
                ],
                [   //55
                    'pro_name' => 'Thanh Hóa',
                    'reg_id' => 3
                ],
                [   //56
                    'pro_name' => 'Thừa Thiên Huế',
                    'reg_id' => 3
                ],
                [   //57
                    'pro_name' => 'Tiền Giang',
                    'reg_id' => 4
                ],
                [   //58
                    'pro_name' => 'TP Hồ Chí Minh',
                    'reg_id' => 4
                ],
                [   //59
                    'pro_name' => 'Trà Vinh',
                    'reg_id' => 4
                ],
                [   //60
                    'pro_name' => 'Tuyên Quang',
                    'reg_id' => 2
                ],
                [   //61
                    'pro_name' => 'Vĩnh Long',
                    'reg_id' => 4
                ],
                [   //62
                    'pro_name' => 'Vĩnh Phúc',
                    'reg_id' => 2
                ],
                [   //63
                    'pro_name' => 'Yên Bái',
                    'reg_id' => 2
                ]
            ]
        );
    }
}
