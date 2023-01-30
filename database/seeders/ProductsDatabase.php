<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Products')->insert(
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
                    'prd_description' => 'Cách dùng: Có thể dùng ngay, nước có ga Coca-Cola sẽ ngon hơn khi uống lạnh hoặc pha chế các loại đồ uống như cocktail.',
                ],
                [
                    'prd_code' => 'SP7',
                    'prd_name' => 'Snack mì gà cay Samyang',
                    'prd_type_id' => 1,
                    'prd_weigh' => 90,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => 'Với sản phẩm này, có thể ăn trực tiếp như snack hoặc nấu với nước sôi ăn như bình thường.Sợi mì: Bột mì, tinh bột khoai tây biến tính, dầu cọ, bột gạo, muối... Gói gia vị: Gia vị gà cay, đường, gia vị habanero, muối,...',
                ],
                [
                    'prd_code' => 'SP8',
                    'prd_name' => 'Snack xoắn vị cay Donghwa',
                    'prd_type_id' => 1,
                    'prd_weigh' => 140,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 31000,
                    'prd_discount' => 0,
                    'prd_description' => 'Thành phần: Lúa mì mỹ, đường, dầu thực vật (dầu cọ từ malaysia), nước, muối tinh, glucose, chất điều chỉnh độ axit, bột ớt, hương liệu tổng hợp (hương vị Gim, hương vị creacker),...',
                ],
                [
                    'prd_code' => 'SP10',
                    'prd_name' => 'Sữa Dưa Gang Binggrae (lốc 6 hộp)',
                    'prd_type_id' => 3,
                    'prd_weigh' => 200,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 135000,
                    'prd_discount' => 0,
                    'prd_description' => 'Đơn giản bởi Sữa dưa gang mang đến cho bạn một cảm giác nhẹ nhàng với vị ngọt dịu. Sản phẩm phù hợp cho mọi lứa tuổi đặc biệt là người lớn tuổi và trẻ em trên 1 tuổi',
                ],
                [
                    'prd_code' => 'SP13',
                    'prd_name' => 'Soda nho Chupa Chups',
                    'prd_type_id' => 3,
                    'prd_weigh' => 345,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => 'Thành phần: Nước có ga, xi-rô fructose, đường, axit citric, nước ép nho đen, kali citrate... Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời',
                ],
                [
                    'prd_code' => 'SP14',
                    'prd_name' => 'Soda cam Chupa Chups',
                    'prd_type_id' => 3,
                    'prd_weigh' => 345,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => 'Thành phần: Nước có ga, xi rô ngô, chiết xuất cam, kẹo cao su Ả Rập (E414), vitamin C, hương cam, hương nhân tạo (cam)...',
                ],
                [
                    'prd_code' => 'SP18',
                    'prd_name' => 'Bánh chocopie nho Lotte (hộp 12 cái)',
                    'prd_type_id' => 2,
                    'prd_weigh' => 216,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 85000,
                    'prd_discount' => 0,
                    'prd_description' => 'Thành phần: Kem sữa, kem thực vật, đường, bột whey protein, bột mì, siro tinh bột, siro nho mẫu đơn shine muscat, dầu đã qua chế biến, dầu ăn hỗn hợp, nước tinh khiết, chất lỏng trứng, chất lỏng sorbitol, cô đặc nho, glycerin, muối tinh,...',
                ],
                [
                    'prd_code' => 'SP19',
                    'prd_name' => 'Bánh chocopie kem chuối Orion (hộp 12 cái)',
                    'prd_type_id' => 2,
                    'prd_weigh' => 444,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 105000,
                    'prd_discount' => 0,
                    'prd_description' => 'Thành phần: Bột mì, kem chuối trắng, đường, xi-rô ngô, chất lỏng toàn bộ trứng, sữa bột nguyên chất, chuối nghiền, gelatin, maltodextrin, kem sữa bột, chất điều chỉnh độ chua, muối, bột màu vàng của cây sơn chi, kẹo cao su xanthan,...',
                ],
            ]
        );
    }
}
