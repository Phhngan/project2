<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Product')->insert(
            [
                [
                    'prd_code' => 'SP1',
                    'prd_name' => 'Khô gà lá chanh',
                    'prd_type_id' => 1,
                    'prd_weigh' => 500,
                    'prd_source' => 'Việt Nam',
                    'prd_price' => 95000,
                    'prd_discount' => 0,
                    'prd_description' => 'Khô gà được lựa chọn từ những miếng thịt gà tươi thơm ngon. Sản xuất dựa trên công nghệ hiện đại đảm bảo an toàn vệ sinh thực phẩm.',
                ],
                [
                    'prd_code' => 'SP2',
                    'prd_name' => 'Cơm cháy chà bông',
                    'prd_type_id' => 1,
                    'prd_weigh' => 300,
                    'prd_source' => 'Việt Nam',
                    'prd_price' => 50000,
                    'prd_discount' => 0,
                    'prd_description' => 'Món cơm cháy chà bông giòn rụm, hòa quyện cùng chà bông mặn mặn, ngọt ngọt rất hấp dẫn. Sản xuất dựa trên công nghệ hiện đại đảm bảo an toàn vệ sinh thực phẩm.',
                ],
                [
                    'prd_code' => 'SP3',
                    'prd_name' => 'Bánh que pocky',
                    'prd_type_id' => 2,
                    'prd_weigh' => 40,
                    'prd_source' => 'Thái Lan',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => 'Sản phẩm được nhập khẩu từ Malaysia, sản xuất theo quy trình hiện đại. Bánh đạt chất lượng an toàn vệ sinh thực phẩm, mang đến sự an tâm cho người dùng.',
                ],
                [
                    'prd_code' => 'SP4',
                    'prd_name' => 'Bánh gấu mix 3 vị',
                    'prd_type_id' => 2,
                    'prd_weigh' => 450,
                    'prd_source' => 'Việt Nam',
                    'prd_price' => 60000,
                    'prd_discount' => 0,
                    'prd_description' => 'Bánh gấu mix 3 vị là bánh quy chất lượng cao với vị ngon của nhân kem sữa thơm ngon. Sản phẩm là sự kết hợp giữa hương vị ngọt ngào, đậm đà của lớp kem từ bên trong và vị giòn tan của vỏ bánh bên ngoài, sẽ hấp dẫn bất kì ai mỗi khi thưởng thức.',
                ],
                [
                    'prd_code' => 'SP5',
                    'prd_name' => 'Trà hoa quả Meco',
                    'prd_type_id' => 3,
                    'prd_weigh' => 400,
                    'prd_source' => 'Trung Quốc',
                    'prd_price' => 30000,
                    'prd_discount' => 0,
                    'prd_description' => 'Được điều chế một cách tỉ mỉ, đảm bảo được độ dung hòa hoàn hảo giữa hồng trà và sữa bò, hương sữa nồng đượm, mùi vị nguyên chất tinh khiết, là một sản phẩm hiếm hoi với chất lượng an toàn cho sức khỏe cao.',
                ],
                [
                    'prd_code' => 'SP6',
                    'prd_name' => 'Coca Cola Sig Mixers',
                    'prd_type_id' => 3,
                    'prd_weigh' => 200,
                    'prd_source' => 'Pháp',
                    'prd_price' => 96000,
                    'prd_discount' => 0,
                    'prd_description' => 'Mô tả sau',
                ],
            ]
        );
    }
}
