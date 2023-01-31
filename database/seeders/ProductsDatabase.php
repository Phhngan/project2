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
                    'prd_discount' => 15,
                    'prd_description' => 'Khô gà được lựa chọn từ những miếng thịt gà tươi thơm ngon. Sản xuất dựa trên công nghệ hiện đại đảm bảo an toàn vệ sinh thực phẩm.<br>
                    <br>- Thành phần: Thịt gà tươi, Muối, Đường, Tỏi, Ớt, Dầu ăn, Gia vị,..
                    <br>- Quy trình sản xuất:
                    <br>&emsp;Lựa chọn nguyên liệu từ các nông trại vùng quê phía NAM, Gia Vị được nghiên cứu hơn 2 năm 
                    <br>&emsp;+	Sơ chế ức gà tươi bằng công nghệ VATPP giúp ức gà sạch sẽ	
                    <br>&emsp;+	Luộc bằng nước tinh khiết ở nhiệt độ 120°C để giữ độ ngọt của gà
                    <br>&emsp;+	Xé gà bằng máy xé chuyên dụng ở môi trường khép kín
                    <br>&emsp;+	Sau đó trộn gia vị vào cùng thịt gà xoay đều 260 vòng / 1 phút 
                    <br>&emsp;+	Cuối cùng sấy ở nhiệt độ 80°C và đóng gói thành phẩm tại chỗ
                    <br>⇒ Đã tạo thành sản phẩm: “Khô Gà Lá Chanh”
                    <br>✓ Thích hợp với tất cả từ già tới trẻ, từ gái đến trai. Từ học sinh, sinh viên tới nhân viên văn phòng.
                    <br>✓ Dùng để nhâm nhi hay có thể thưởng thức với cơm hoặc tạo thành gỏi mực xé chua ngọt siêu thần thánh.
                    <br>✓ Nhỏ gọn, tiện lợi có thể dùng để mang theo khi đi học, picnic ở nhà ngồi không tán gẫu với bạn bè.

                    <br><br>- Hướng dẫn sử dụng: Dùng ăn trực tiếp.
                    <br>- Hướng dẫn bảo quản: Nhiệt độ thường',
                ],
                [
                    'prd_code' => 'SP2',
                    'prd_name' => 'Cơm cháy chà bông',
                    'prd_type_id' => 1,
                    'prd_weigh' => 300,
                    'prd_source' => 'Việt Nam',
                    'prd_price' => 50000,
                    'prd_discount' => 5,
                    'prd_description' => 'Món cơm cháy chà bông giòn rụm, hòa quyện cùng chà bông mặn mặn, ngọt ngọt rất hấp dẫn. Sản xuất dựa trên công nghệ hiện đại đảm bảo an toàn vệ sinh thực phẩm.
                    <br>Thành phần:
                    <br>&emsp;-	Gạo nếp cái hoa vàng - đặc sản của đồng bằng Bắc Bộ
                    <br>&emsp;-	Dầu thực vật
                    <br>&emsp;-	Ruốc thịt lợn sạch
                    <br>&emsp;-	Gia vị: Muối, tiêu, đường,...
                    <br>Sản phẩm đã qua chế biến, nên sử dụng ngay sau khi mở túi, có thể ăn kèm thêm với các nước xốt dê, nước xốt tim cật, tương ớt,...',
                ],
                [
                    'prd_code' => 'SP3',
                    'prd_name' => 'Bánh que pocky',
                    'prd_type_id' => 2,
                    'prd_weigh' => 40,
                    'prd_source' => 'Thái Lan',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => 'Sản phẩm được nhập khẩu từ Malaysia, sản xuất theo quy trình hiện đại. Bánh đạt chất lượng an toàn vệ sinh thực phẩm, mang đến sự an tâm cho người dùng.
                    <br>Bánh que Glico Pocky cookies & cream hộp 40g là bánh que với ống que giòn ngon kết hợp với ống nhân kem socola trắng tạo cảm giác thích thú khi ăn, lại cảm nhận trọn vẹn sự hòa quyện giữa vỏ bánh giòn rụm với nhân kem. Sản phẩm thích hợp ăn vặt gia đình và văn phòng đến từ thương hiệu bánh que Glico.
                    <br>Bánh Que Pocky được làm từ các thành phần chính như: bột mỳ, đường, dầu thực vật, bột cacao, sữa gày, dịch chiết từ mầm lúa mạch, tinh bột biến tính, nấm men, sữa đậu nành, lúa mạch, lúa mạch đen và yến mạch. Sản phẩm được sản xuất trên dây chuyền hiện đại, trải qua quá trình thẩm định nghiêm ngặt để đảm bảo an toàn cho sức khỏe người dùng.',
                ],
                [
                    'prd_code' => 'SP4',
                    'prd_name' => 'Bánh gấu mix 3 vị',
                    'prd_type_id' => 2,
                    'prd_weigh' => 450,
                    'prd_source' => 'Việt Nam',
                    'prd_price' => 60000,
                    'prd_discount' => 0,
                    'prd_description' => 'Bánh gấu mix 3 vị là bánh quy chất lượng cao với vị ngon của nhân kem sữa thơm ngon. Sản phẩm là sự kết hợp giữa hương vị ngọt ngào, đậm đà của lớp kem từ bên trong và vị giòn tan của vỏ bánh bên ngoài, sẽ hấp dẫn bất kì ai mỗi khi thưởng thức.
                    <br>&emsp; -	Bánh gấu chùm ngây nhân kem bơ (xanh): nhân kem bơ, nhưng lớp vỏ được làm từ bột lá cây chùm ngây, cực tốt cho sức khỏe đặc biệt là các bé nhỏ
                    <br>&emsp; -	Bánh gấu vị sô cô la (nâu): Nhân kem đậm đà Socola cà phê làm cho món bánh tuổi thơ thêm phần kích thích vị giác.
                    <br>&emsp; -	Bánh gấu kem béo (vàng): Vẫn là hương vị của tuổi thơ với thành phần từ bột mì, đường sữa. Lớp bánh giòn bùi thơm phức, nhân kem ngọt béo. 
                    <br>&emsp; Sản phẩm có giấy chứng nhận an toàn vệ sinh thực phẩm.
                    <br> Hướng dẫn sử dụng: Dùng trực tiếp, không cần chế biến.
                    <br> Hướng dẫn bảo quản: Nơi khô ráo thoáng mát, tránh ánh nắng mặt trời. Dùng không hết có thể đóng kín miệng nắp để dùng lần sau.
                    <br> Không sử dụng sản phẩm đã hết hạn.
                    <br> Mỗi hương vị là 1 loại khác nhau nhưng đều rất cuốn hút, đặc biệt là dành cho các em bé thì đây là món ăn vặt rất tốt.',
                ],
                [
                    'prd_code' => 'SP5',
                    'prd_name' => 'Trà hoa quả Meco',
                    'prd_type_id' => 3,
                    'prd_weigh' => 400,
                    'prd_source' => 'Trung Quốc',
                    'prd_price' => 30000,
                    'prd_discount' => 0,
                    'prd_description' => 'Được điều chế một cách tỉ mỉ, đảm bảo được độ dung hòa hoàn hảo giữa hồng trà và sữa bò, hương sữa nồng đượm, mùi vị nguyên chất tinh khiết, là một sản phẩm hiếm hoi với chất lượng an toàn cho sức khỏe cao.
                    <br>Trà Meco vị chanh Thái 400ml được làm từ hồng trà Assam Ấn Độ kết hợp với nước ép trái cây tươi mang lại hương vị thơm đặc trưng từ chanh, một loại trái cây ưa dùng và thường được mọi người sử dụng.Có tác dụng giải khát, thanh nhiệt cơ thể, sảng khoái tinh thần.Sản phẩm thiết kế dạng ly nhựa PP đảm bảo an toàn vệ sinh thực phẩm với công nghệ sản xuất chiết rót tiệt trùng.Có ống hút nhỏ kèm theo, dễ dàng mang mang theo.
                    <br>Bảo quản nơi khô ráo, thoáng mát, tránh ẩm ướt và tránh ánh nắng trực tiếp.
                    <br>Hướng dẫn sử dụng: dùng trực tiếp. Ngon hơn khi để lạnh
                    <br>Sau khi mở cốc có thể bảo quản được 6 tiếng ở nhiệt độ 0 - 6 độ C.',
                ],
                [
                    'prd_code' => 'SP6',
                    'prd_name' => 'Coca Cola Sig Mixers',
                    'prd_type_id' => 3,
                    'prd_weigh' => 200,
                    'prd_source' => 'Pháp',
                    'prd_price' => 96000,
                    'prd_discount' => 15,
                    'prd_description' => '- Nước ngọt Coca cola Sig Mixers là một hỗn hợp hương hoa, sắc nét và chua cay thú vị, Signature Mixer vị thảo mộc được phát triển để mang đến hương thơm tươi mát và thảo mộc cho khẩu vị sành điệu. 
                    <br>- Nước uống cân bằng hương thơm sảng khoái của sả với tông màu đất của hạt thì là và tagetes khơi gợi nguồn năng lượng tích cực, kích thích giác quan cho bạn một ngày làm việc hiệu quả.
                    <br>- Thể tích: Chai Sành 200ml.
                    <br>- Thương hiệu: CocaCola. 
                    <br>- Xuất xứ thương hiệu: Pháp.
                    <br>- Giá sản phẩm trên OriMart đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh,..
                    
                    <br>THÀNH PHẦN
                    <br>&emsp; - Thành phần: Coca-Cola Sig Mixers Vị Thảo Mộc là loại nước ngọt có ga bao gồm: Đường, màu (E150d), axit (E338), hương liệu tự nhiên (bao gồm cả caffein).
                    
                    <br>CÔNG DỤNG
                    <br>&emsp; - Nước ngọt có ga Coca-Cola Sig Mixers là nước uống giải nhiêt, giải khát tức thời trong mùa hè oi ả.
                    <br>&emsp; - Với hương thơm tươi mát và thảo mộc Coca cola Sig Mixers giúp bạn tăng cường sự tỉnh táo, đồng thời giúp tâm trí chúng ta thoải mái hơn, tinh thần tập trung cao hơn.
                    <br>&emsp; - Có thể kết hợp Coca Cola Mig với Scotch Whisky hoặc Tequila để pha chế các loại cocktail tạo cảm giác thư giãn khi trải nghiệm.',
                ],
                [
                    'prd_code' => 'SP7',
                    'prd_name' => 'Snack mì gà cay Samyang',
                    'prd_type_id' => 1,
                    'prd_weigh' => 90,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => '- Thành phần: 
                    <br>&emsp;Sợi mì: Bột mì, tinh bột khoai tây biến tính, dầu cọ, bột gạo, muối, chiết xuất hàng, chất điều vị chua,...
                    <br>&emsp;Gói gia vị: Gia vị gà cay, đường, gia vị habanero, muối, bột bulgogi, bột tiêu, dầu ớt,...
                    <br>- Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh sáng mặt trời
                    <br>- Hạn sử dụng: 12 tháng kể từ ngày sản xuất
                    <br>- Hướng dẫn sử dụng: 
                    <br>&emsp;Cách 1: Bẻ gói mì thành 4-6 phần, cho gói gia vị vào, lắc đều rồi thưởng thức
                    <br>&emsp;Cách 2: Bỏ mì vào 250ml nước sôi, đun sôi tiếp khoảng 1 phút 30 giây. Tắt lửa cho gói gia vị vào trộn đều và thưởng thức.',
                ],
                [
                    'prd_code' => 'SP8',
                    'prd_name' => 'Snack xoắn vị cay Donghwa',
                    'prd_type_id' => 1,
                    'prd_weigh' => 140,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 31000,
                    'prd_discount' => 0,
                    'prd_description' => 'Thành phần: Lúa mì mỹ, đường, dầu thực vật (dầu cọ từ malaysia), nước, muối tinh, glucose, chất điều chỉnh độ axit, bột ớt, hương liệu tổng hợp (hương vị Gim, hương vị creacker),...
                    <br>Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời                    
                    <br>Hạn sử dụng: 8 tháng kể từ ngày sản xuất',
                ],
                [
                    'prd_code' => 'SP9',
                    'prd_name' => 'Sữa Dưa Gang Binggrae (lốc 6 hộp)',
                    'prd_type_id' => 3,
                    'prd_weigh' => 200,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 135000,
                    'prd_discount' => 13,
                    'prd_description' => '- Đơn giản bởi Sữa dưa gang mang đến cho bạn một cảm giác nhẹ nhàng với vị ngọt dịu
                    <br>- Sản phẩm phù hợp cho mọi lứa tuổi đặc biệt là người lớn tuổi và trẻ em trên 1 tuổi
                    <br>- Quy cách đóng gói: Hộp giấy, lốc 6 hộp
                    <br> - Thương hiệu: Binggare. Thương hiệu Sữa Binggrae từ năm 1974
                    <br>- Hướng dẫn sử dụng:  Rất đơn giản và tiện lợi, có thể mở ra và dùng ngay. Có thể uống lạnh hoặc không lạnh.
                    <br>- Bảo quản: Ở nhiệt độ thường. Tránh ánh nắng trực tiếp.
                    <br>- Hạn sử dụng: 8 tháng kể từ ngày sản xuất',
                ],
                [
                    'prd_code' => 'SP10',
                    'prd_name' => 'Soda nho Chupa Chups',
                    'prd_type_id' => 3,
                    'prd_weigh' => 345,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => '- Thành phần: Nước có ga, xi-rô fructose, đường, axit citric, nước ép nho đen, kali citrate,...

                    <br>- Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời
                    
                    <br>- Hướng dẫn sử dụng: Uống trực tiếp, ngon hơn khi dùng lạnh.
                    
                    <br>- Hạn sử dụng: 18 tháng kể từ ngày sản xuất',
                ],
                [
                    'prd_code' => 'SP11',
                    'prd_name' => 'Soda cam Chupa Chups',
                    'prd_type_id' => 3,
                    'prd_weigh' => 345,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_description' => '- Thành phần: Nước có ga, xi rô ngô, chiết xuất cam, kẹo cao su Ả Rập (E414), vitamin C, hương cam, hương nhân tạo (cam),...

                    <br>- Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời
                    
                    <br>- Hướng dẫn sử dụng: Uống trực tiếp, ngon hơn khi dùng lạnh.
                    
                    <br>- Hạn sử dụng: 18 tháng kể từ ngày sản xuất',
                ],
                [
                    'prd_code' => 'SP12',
                    'prd_name' => 'Bánh chocopie nho Lotte (hộp 12 cái)',
                    'prd_type_id' => 2,
                    'prd_weigh' => 216,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 85000,
                    'prd_discount' => 0,
                    'prd_description' => '- Thành phần: Kem sữa, kem thực vật, đường, bột whey protein, bột mì, xi-rô tinh bột, xi-rô nho mẫu đơn shine muscat, dầu đã qua chế biến, dầu ăn hỗn hợp, shortening, nước tinh khiết, chất lỏng trứng, chất lỏng sorbitol, cô đặc nho, glycerin, muối tinh, màu xanh gardenia,…

                    <br>- Một hộp gồm 12 chiếc bánh
                    
                    <br> - Hướng dẫn bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời
                    
                    <br> - Hướng dẫn sử dụng: Dùng trực tiếp sau khi xé bao bì
                    
                    <br>- Hạn sử dụng: 6 tháng kể từ ngày sản xuất',
                ],
                [
                    'prd_code' => 'SP13',
                    'prd_name' => 'Bánh chocopie kem chuối Orion (hộp 12 cái)',
                    'prd_type_id' => 2,
                    'prd_weigh' => 444,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 105000,
                    'prd_discount' => 8,
                    'prd_description' => '- Thành phần: Bột mì, kem chuối trắng (dầu thực vật 1, đường trắng, sữa bột tách béo, lactose, dầu thực vật 2, bột cô đặc chuối), đường, xi-rô ngô, chất lỏng toàn bộ trứng, sữa bột nguyên chất, chuối nghiền, gelatin, maltodextrin, kem sữa bột, chất điều chỉnh độ chua, muối, bột màu vàng của cây sơn chi, kẹo cao su xanthan, bột chiết xuất màu vàng gardenia,…

                    <br>- Bảo quản: Nơi khô ráo, thoáng mát, tránh nơi ẩm ướt và ánh sáng mặt trời
                    
                    <br>- Hướng dẫn sử dụng: Dùng trực tiếp như món snack
                    
                    <br>- Hạn sử dụng: 6 tháng kể từ ngày sản xuất
                    
                    <br>- Thương hiệu: Orion',
                ],
            ]
        );
    }
}
