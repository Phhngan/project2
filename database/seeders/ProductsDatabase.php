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
                    'prd_image' => 'public/SP1.png',
                    'prd_description' => '<p>&nbsp;</p><p>Khô gà được lựa chọn từ những miếng thịt gà tươi thơm ngon. Sản xuất dựa trên công nghệ hiện đại đảm bảo an toàn vệ sinh thực phẩm.<br>
                    <br>- Thành phần: Thịt gà tươi, Muối, Đường, Tỏi, Ớt, Dầu ăn, Gia vị,..&nbsp;<br>- Quy trình sản xuất:&nbsp;
                    <br> Lựa chọn nguyên liệu từ các nông trại vùng quê phía NAM, Gia Vị được nghiên cứu hơn 2 năm&nbsp;<br>
                     + Sơ chế ức gà tươi bằng công nghệ VATPP giúp ức gà sạch sẽ&nbsp;<br>
                     + Luộc bằng nước tinh khiết ở nhiệt độ 120°C để giữ độ ngọt của gà&nbsp;<br> 
                    + Xé gà bằng máy xé chuyên dụng ở môi trường khép kín&nbsp;<br> 
                    + Sau đó trộn gia vị vào cùng thịt gà xoay đều 260 vòng / 1 phút&nbsp;<br>
                     + Cuối cùng sấy ở nhiệt độ 80°C và đóng gói thành phẩm tại chỗ&nbsp;<br>
                    ⇒ Đã tạo thành sản phẩm: “Khô Gà Lá Chanh”&nbsp;<br>✓ Thích hợp với tất cả từ già tới trẻ, từ gái đến trai. Từ học sinh, sinh viên tới nhân viên văn phòng.&nbsp;<br>
                    ✓ Dùng để nhâm nhi hay có thể thưởng thức với cơm hoặc tạo thành gỏi mực xé chua ngọt siêu thần thánh.&nbsp;<br>
                    ✓ Nhỏ gọn, tiện lợi có thể dùng để mang theo khi đi học, picnic ở nhà ngồi không tán gẫu với bạn bè.</p>
                    <figure class="image"><img class="format-img" src="https://vinafood.vn/wp-content/uploads/2020/07/mon-kho-ga-la-chanh.jpg" alt="Khô gà lá chanh món ăn tốt cho sức khỏe gia đình"></figure>
                    <p>&nbsp;</p><p>- Hướng dẫn sử dụng: Dùng ăn trực tiếp.&nbsp;<br>- Hướng dẫn bảo quản: Nhiệt độ thường</p>',
                ],
                [
                    'prd_code' => 'SP2',
                    'prd_name' => 'Cơm cháy chà bông',
                    'prd_type_id' => 1,
                    'prd_weigh' => 300,
                    'prd_source' => 'Việt Nam',
                    'prd_price' => 50000,
                    'prd_discount' => 5,
                    'prd_image' => 'public/SP2.png',
                    'prd_description' => '<p>Món cơm cháy chà bông giòn rụm, hòa quyện cùng chà bông mặn mặn, ngọt ngọt rất hấp dẫn. Sản xuất dựa trên công nghệ hiện đại đảm bảo an toàn vệ sinh thực phẩm.
                    <br>Thành phần:
                    <br>&emsp;-	Gạo nếp cái hoa vàng - đặc sản của đồng bằng Bắc Bộ
                    <br>&emsp;-	Dầu thực vật
                    <br>&emsp;-	Ruốc thịt lợn sạch
                    <br>&emsp;-	Gia vị: Muối, tiêu, đường,...
                    <br>Sản phẩm đã qua chế biến, nên sử dụng ngay sau khi mở túi, có thể ăn kèm thêm với các nước xốt dê, nước xốt tim cật, tương ớt,...</p>',
                ],
                [
                    'prd_code' => 'SP3',
                    'prd_name' => 'Bánh que pocky',
                    'prd_type_id' => 2,
                    'prd_weigh' => 40,
                    'prd_source' => 'Thái Lan',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP3.png',
                    'prd_description' => '<p>Sản phẩm được nhập khẩu từ Malaysia, sản xuất theo quy trình hiện đại. Bánh đạt chất lượng an toàn vệ sinh thực phẩm, mang đến sự an tâm cho người dùng.
                    <br>Bánh que Glico Pocky cookies & cream hộp 40g là bánh que với ống que giòn ngon kết hợp với ống nhân kem socola trắng tạo cảm giác thích thú khi ăn, lại cảm nhận trọn vẹn sự hòa quyện giữa vỏ bánh giòn rụm với nhân kem. Sản phẩm thích hợp ăn vặt gia đình và văn phòng đến từ thương hiệu bánh que Glico.
                    <br>Bánh Que Pocky được làm từ các thành phần chính như: bột mỳ, đường, dầu thực vật, bột cacao, sữa gày, dịch chiết từ mầm lúa mạch, tinh bột biến tính, nấm men, sữa đậu nành, lúa mạch, lúa mạch đen và yến mạch. Sản phẩm được sản xuất trên dây chuyền hiện đại, trải qua quá trình thẩm định nghiêm ngặt để đảm bảo an toàn cho sức khỏe người dùng.</p>',
                ],
                [
                    'prd_code' => 'SP4',
                    'prd_name' => 'Bánh gấu mix 3 vị',
                    'prd_type_id' => 2,
                    'prd_weigh' => 450,
                    'prd_source' => 'Việt Nam',
                    'prd_price' => 60000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP4.png',
                    'prd_description' => '<p>Bánh gấu mix 3 vị là bánh quy chất lượng cao với vị ngon của nhân kem sữa thơm ngon. Sản phẩm là sự kết hợp giữa hương vị ngọt ngào, đậm đà của lớp kem từ bên trong và vị giòn tan của vỏ bánh bên ngoài, sẽ hấp dẫn bất kì ai mỗi khi thưởng thức.
                    <br>&emsp; -	Bánh gấu chùm ngây nhân kem bơ (xanh): nhân kem bơ, nhưng lớp vỏ được làm từ bột lá cây chùm ngây, cực tốt cho sức khỏe đặc biệt là các bé nhỏ
                    <br>&emsp; -	Bánh gấu vị sô cô la (nâu): Nhân kem đậm đà Socola cà phê làm cho món bánh tuổi thơ thêm phần kích thích vị giác.
                    <br>&emsp; -	Bánh gấu kem béo (vàng): Vẫn là hương vị của tuổi thơ với thành phần từ bột mì, đường sữa. Lớp bánh giòn bùi thơm phức, nhân kem ngọt béo.
                    <br>&emsp; Sản phẩm có giấy chứng nhận an toàn vệ sinh thực phẩm.
                    <br> Hướng dẫn sử dụng: Dùng trực tiếp, không cần chế biến.
                    <br> Hướng dẫn bảo quản: Nơi khô ráo thoáng mát, tránh ánh nắng mặt trời. Dùng không hết có thể đóng kín miệng nắp để dùng lần sau.
                    <br> Không sử dụng sản phẩm đã hết hạn.
                    <br> Mỗi hương vị là 1 loại khác nhau nhưng đều rất cuốn hút, đặc biệt là dành cho các em bé thì đây là món ăn vặt rất tốt.</p>',
                ],
                [
                    'prd_code' => 'SP5',
                    'prd_name' => 'Trà hoa quả Meco',
                    'prd_type_id' => 3,
                    'prd_weigh' => 400,
                    'prd_source' => 'Trung Quốc',
                    'prd_price' => 30000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP5.png',
                    'prd_description' => '<p>Được điều chế một cách tỉ mỉ, đảm bảo được độ dung hòa hoàn hảo giữa hồng trà và sữa bò, hương sữa nồng đượm, mùi vị nguyên chất tinh khiết, là một sản phẩm hiếm hoi với chất lượng an toàn cho sức khỏe cao.
                    <br>Trà Meco vị chanh Thái 400ml được làm từ hồng trà Assam Ấn Độ kết hợp với nước ép trái cây tươi mang lại hương vị thơm đặc trưng từ chanh, một loại trái cây ưa dùng và thường được mọi người sử dụng.Có tác dụng giải khát, thanh nhiệt cơ thể, sảng khoái tinh thần.Sản phẩm thiết kế dạng ly nhựa PP đảm bảo an toàn vệ sinh thực phẩm với công nghệ sản xuất chiết rót tiệt trùng.Có ống hút nhỏ kèm theo, dễ dàng mang mang theo.
                    <br>Bảo quản nơi khô ráo, thoáng mát, tránh ẩm ướt và tránh ánh nắng trực tiếp.
                    <br>Hướng dẫn sử dụng: dùng trực tiếp. Ngon hơn khi để lạnh
                    <br>Sau khi mở cốc có thể bảo quản được 6 tiếng ở nhiệt độ 0 - 6 độ C.</p>',
                ],
                [
                    'prd_code' => 'SP6',
                    'prd_name' => 'Coca Cola Sig Mixers',
                    'prd_type_id' => 3,
                    'prd_weigh' => 200,
                    'prd_source' => 'Pháp',
                    'prd_price' => 96000,
                    'prd_discount' => 15,
                    'prd_image' => 'public/SP6.png',
                    'prd_description' => '<p>- Nước ngọt Coca cola Sig Mixers là một hỗn hợp hương hoa, sắc nét và chua cay thú vị, Signature Mixer vị thảo mộc được phát triển để mang đến hương thơm tươi mát và thảo mộc cho khẩu vị sành điệu.
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
                    <br>&emsp; - Có thể kết hợp Coca Cola Mig với Scotch Whisky hoặc Tequila để pha chế các loại cocktail tạo cảm giác thư giãn khi trải nghiệm.</p>',
                ],
                [
                    'prd_code' => 'SP7',
                    'prd_name' => 'Snack mì gà cay Samyang',
                    'prd_type_id' => 1,
                    'prd_weigh' => 90,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP7.png',
                    'prd_description' => '<p>- Thành phần:
                    <br>&emsp;Sợi mì: Bột mì, tinh bột khoai tây biến tính, dầu cọ, bột gạo, muối, chiết xuất hàng, chất điều vị chua,...
                    <br>&emsp;Gói gia vị: Gia vị gà cay, đường, gia vị habanero, muối, bột bulgogi, bột tiêu, dầu ớt,...
                    <br>- Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh sáng mặt trời
                    <br>- Hạn sử dụng: 12 tháng kể từ ngày sản xuất
                    <br>- Hướng dẫn sử dụng:
                    <br>&emsp;Cách 1: Bẻ gói mì thành 4-6 phần, cho gói gia vị vào, lắc đều rồi thưởng thức
                    <br>&emsp;Cách 2: Bỏ mì vào 250ml nước sôi, đun sôi tiếp khoảng 1 phút 30 giây. Tắt lửa cho gói gia vị vào trộn đều và thưởng thức.</p>',
                ],
                [
                    'prd_code' => 'SP8',
                    'prd_name' => 'Snack xoắn vị cay Donghwa',
                    'prd_type_id' => 1,
                    'prd_weigh' => 140,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 31000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP8.png',
                    'prd_description' => '<p>Thành phần: Lúa mì mỹ, đường, dầu thực vật (dầu cọ từ malaysia), nước, muối tinh, glucose, chất điều chỉnh độ axit, bột ớt, hương liệu tổng hợp (hương vị Gim, hương vị creacker),...
                    <br>Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời
                    <br>Hạn sử dụng: 8 tháng kể từ ngày sản xuất</p>',
                ],
                [
                    'prd_code' => 'SP9',
                    'prd_name' => 'Sữa Dưa Gang Binggrae (lốc 6 hộp)',
                    'prd_type_id' => 3,
                    'prd_weigh' => 200,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 135000,
                    'prd_discount' => 13,
                    'prd_image' => 'public/SP9.png',
                    'prd_description' => '<p>- Đơn giản bởi Sữa dưa gang mang đến cho bạn một cảm giác nhẹ nhàng với vị ngọt dịu
                    <br>- Sản phẩm phù hợp cho mọi lứa tuổi đặc biệt là người lớn tuổi và trẻ em trên 1 tuổi
                    <br>- Quy cách đóng gói: Hộp giấy, lốc 6 hộp
                    <br> - Thương hiệu: Binggare. Thương hiệu Sữa Binggrae từ năm 1974
                    <br>- Hướng dẫn sử dụng:  Rất đơn giản và tiện lợi, có thể mở ra và dùng ngay. Có thể uống lạnh hoặc không lạnh.
                    <br>- Bảo quản: Ở nhiệt độ thường. Tránh ánh nắng trực tiếp.
                    <br>- Hạn sử dụng: 8 tháng kể từ ngày sản xuất</p>',
                ],
                [
                    'prd_code' => 'SP10',
                    'prd_name' => 'Soda nho Chupa Chups',
                    'prd_type_id' => 3,
                    'prd_weigh' => 345,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP10.png',
                    'prd_description' => '<p>- Thành phần: Nước có ga, xi-rô fructose, đường, axit citric, nước ép nho đen, kali citrate,...

                    <br>- Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời

                    <br>- Hướng dẫn sử dụng: Uống trực tiếp, ngon hơn khi dùng lạnh.

                    <br>- Hạn sử dụng: 18 tháng kể từ ngày sản xuất</p>',
                ],
                [
                    'prd_code' => 'SP11',
                    'prd_name' => 'Soda cam Chupa Chups',
                    'prd_type_id' => 3,
                    'prd_weigh' => 345,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 20000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP11.png',
                    'prd_description' => '<p>- Thành phần: Nước có ga, xi rô ngô, chiết xuất cam, kẹo cao su Ả Rập (E414), vitamin C, hương cam, hương nhân tạo (cam),...

                    <br>- Bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời

                    <br>- Hướng dẫn sử dụng: Uống trực tiếp, ngon hơn khi dùng lạnh.

                    <br>- Hạn sử dụng: 18 tháng kể từ ngày sản xuất</p>',
                ],
                [
                    'prd_code' => 'SP12',
                    'prd_name' => 'Bánh chocopie nho Lotte (hộp 12 cái)',
                    'prd_type_id' => 2,
                    'prd_weigh' => 216,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 85000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP12.png',
                    'prd_description' => '<p>- Thành phần: Kem sữa, kem thực vật, đường, bột whey protein, bột mì, xi-rô tinh bột, xi-rô nho mẫu đơn shine muscat, dầu đã qua chế biến, dầu ăn hỗn hợp, shortening, nước tinh khiết, chất lỏng trứng, chất lỏng sorbitol, cô đặc nho, glycerin, muối tinh, màu xanh gardenia,…

                    <br>- Một hộp gồm 12 chiếc bánh

                    <br> - Hướng dẫn bảo quản: Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời

                    <br> - Hướng dẫn sử dụng: Dùng trực tiếp sau khi xé bao bì

                    <br>- Hạn sử dụng: 6 tháng kể từ ngày sản xuất</p>',
                ],
                [
                    'prd_code' => 'SP13',
                    'prd_name' => 'Bánh chocopie kem chuối Orion (hộp 12 cái)',
                    'prd_type_id' => 2,
                    'prd_weigh' => 444,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 105000,
                    'prd_discount' => 8,
                    'prd_image' => 'public/SP13.png',
                    'prd_description' => '<p>- Thành phần: Bột mì, kem chuối trắng (dầu thực vật 1, đường trắng, sữa bột tách béo, lactose, dầu thực vật 2, bột cô đặc chuối), đường, xi-rô ngô, chất lỏng toàn bộ trứng, sữa bột nguyên chất, chuối nghiền, gelatin, maltodextrin, kem sữa bột, chất điều chỉnh độ chua, muối, bột màu vàng của cây sơn chi, kẹo cao su xanthan, bột chiết xuất màu vàng gardenia,…

                    <br>- Bảo quản: Nơi khô ráo, thoáng mát, tránh nơi ẩm ướt và ánh sáng mặt trời

                    <br>- Hướng dẫn sử dụng: Dùng trực tiếp như món snack

                    <br>- Hạn sử dụng: 6 tháng kể từ ngày sản xuất

                    <br>- Thương hiệu: Orion</p>',
                ],
                [
                    'prd_code' => 'SP14',
                    'prd_name' => 'Thịt hộp Dongwon',
                    'prd_type_id' => 1,
                    'prd_weigh' => 340,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 105000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP14.png',
                    'prd_description' => '<p><strong>Thịt hộp&nbsp;Dongwon 340g&nbsp;</strong>
                    được làm từ nguyên liệu thịt heo và thịt gà tươi thông qua chọn lọc kỹ càng, sau đó được nấu trong phương pháp ủ nhiệt độ thấp 
                    nhằm giữ nguyên hương vị mang đến người tiêu dùng những miếng thịt nguội mềm, ít mặn, thanh nhẹ đầy thơm béo.&nbsp;</p><p>
                    <img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0617/2497/files/thit-hop-dongwon_480x480.png?v=1609235387" alt="Canned meat Dongwon 340g">
                    </p><p>Với sản phẩm này bạn sẽ dễ dàng có ngay một bữa ăn dinh dưỡng mà không cần tốn thời gian chế biến cầu kỳ. 
                    Tiết kiệm được nhiều thời gian nấu nướng khi bận rộn.</p><p>Tuy là sản phẩm đóng sẵn nhưng thịt hộp Luncheon Meat vẫn giữ nguyên hương vị thơm 
                    ngon của thịt và giữ lại được rất nhiều vitamin như vitamin B1, A, D,...</p>
                    <p><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0617/2497/files/thit-hop-lucheon-meat_480x480.jpg?v=1609235408" alt="Canned meat Dongwon 340g"></p>
                    <p>Có thể ăn chung với cơm hoặc kẹp sandwich,...Thích hợp dùng làm lương khô trong các chuyến dã ngoại, picnic,...</p>
                    <p>Đóng hộp nhỏ gọn, dễ dảng bảo quản và mang theo.</p><p><strong>Origin:</strong> South korea</p><p>
                    <strong>Thành phần:&nbsp;</strong>Thịt heo, tinh bột khoai tây, protein sữa, muối, gia vị…</p><p><strong>Khối lượng tịnh:</strong>
                    &nbsp;340g/hộp</p><p><strong>Bảo quản:</strong>&nbsp;Nơi khô ráo, thoáng mát và tránh ánh nắng mặt trời.</p><p><strong>Hướng dẫn sử dụng:</strong> 
                    Hâm nóng lại và ăn trực tiếp hoặc chế biến món ăn theo ý thích.</p><p><strong>Hạn sử dụng: </strong>36 tháng kể từ ngày sản xuất</p>
                    <p><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0617/2497/files/spam-fried-rice_480x480.jpg?v=1609235587" alt="Canned meat Dongwon 340g"></p>',
                ],
                [
                    'prd_code' => 'SP15',
                    'prd_name' => 'Rong biển giòn trộn khô gà O food',
                    'prd_type_id' => 1,
                    'prd_weigh' => 40,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 45000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP15.png',
                    'prd_description' => '<p>Không chỉ dừng lại ở <i>rong biển giòn trộn gia vị truyền thống</i>, mới đây Ofood đã cho ra mắt thêm&nbsp;<strong>Rong biển giòn trộn khô gà Ofood 40g </strong>- một sản phẩm mới với sự&nbsp;kết hợp mới mẻ và sáng tạo giữa rong biển Hàn Quốc và khô gà Việt Nam mang đến một món snack đầy thú vị và hấp dẫn.<br>&nbsp;</p><p><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0617/2497/files/rong-bien-tron-kho-ga-ofood_480x480.png?v=1628609115" alt=""></p><p>Rong biển được nướng giòn với nhiệt độ thích hợp, sau đó trộn cùng dầu mè, vừng và một số loại gia vị mang đến hương vị mằn mặn vừa ăn, xen lẫn vài sợi khô gà dai thơm càng làm cho món snack trở nên thu hút. Hứa hẹn sẽ là món ăn vặt lí tưởng cho các buổi xem phim, vui chơi sinh hoạt,...</p><p><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0617/2497/files/rong-bien-gion-tron-kho-ga_480x480.png?v=1628609225" alt=""></p><p>Có thể dùng để ăn trực triếp hoặc dùng kèm với cơm, mì đều được. Sản phẩm được đóng gói nhỏ gọn, dây chuyền sản xuất hiện đại giúp giảm sự thấm dầu, tăng độ giòn và giữ nguyên hương vị của sản phẩm.<br>&nbsp;</p><p><strong>Thành phần:</strong>&nbsp;Dầu ngô, rong biển Hàn Quốc (21.64%), khô gà (30%), đường, vừng, dầu mè, muối gia vị (3.4%), chất chống oxy hóa (E392)</p><p><strong>Khối lượng tịnh:</strong>&nbsp;40g/gói</p><p><strong>Storage:</strong>&nbsp;dry, cool and avoid sunshine</p><p><strong>Hướng dẫn sử dụng:</strong>&nbsp;Có thể ăn trực tiếp hoặc rắc lên cơm, cháo, súp,...</p><p><strong>Hạn sử dụng:</strong>&nbsp;12&nbsp;tháng kể từ ngày sản xuất</p><p><strong>Xuất xứ:</strong>&nbsp;Việt Nam</p>',
                ],
                [
                    'prd_code' => 'SP16',
                    'prd_name' => 'Khoai Tây Mật Ong Calbee',
                    'prd_type_id' => 2,
                    'prd_weigh' => 60,
                    'prd_source' => 'Hàn Quốc',
                    'prd_price' => 52000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP16.png',
                    'prd_description' => '<p>Sản phẩm trực thuộc một trong những tập đoàn thực phẩm lớn nhất Nhật Bản: Calbee - sau này tấn công vào thị trường Hàn Quốc, Hongkong và đạt được những thành công rất lớn.</p><p>####</p><p>Sản phẩm trực thuộc một trong những tập đoàn thực phẩm lớn nhất Nhật Bản: Calbee - sau này tấn công vào thị trường Hàn Quốc, Hongkong và đạt được những thành công rất lớn.</p><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0563/5745/4002/products/CALBEE.png?v=1623403279" alt=""></figure><p><br>Snack khoai tây tẩm mật ong được Calbee sản xuất riêng cho thị trường Hàn Quốc, và nhanh chóng ĐỨNG ĐẦU top <a href="https://shopee.vn/bestseller-tag">#bestseller</a> tại đây, với số lượng tiêu thụ xếp hạng nhất so với tất cả snacks cùng loại. Đến nỗi các tín đồ ăn vặt kháo nhau đến Hàn tuyệt đối ko bỏ qua "nhất sữa chuối, nhì khoai Calbee.<br>&nbsp;</p><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0563/5745/4002/products/CAL.png?v=1623403286" alt=""></figure><p><br>Calbee tuyệt đối nói không với các loại hương liệu độc hại, nên vị bánh được làm bởi 100% khoai tây nguyên chất, tẩm sốt mật ong thơm nức nở, thêm hành xắt nhuyễn phủ ngoài bánh ngon vô cùng. Ko một loại snacks nào có thể so sánh .</p>',
                ],
                [
                    'prd_code' => 'SP17',
                    'prd_name' => 'Trà Sữa Kirin Nhật 1.5L',
                    'prd_type_id' => 3,
                    'prd_weigh' => 1500,
                    'prd_source' => 'Nhật Bản',
                    'prd_price' => 75000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP17.png',
                    'prd_description' => '<p><strong>1. Thành phần:</strong>&nbsp;Hồng trà, sữa bò, đường, sữa bột toàn phần,...</p><p><strong>2. Công dụng sản phẩm</strong></p><p>Trà sữa Kirin&nbsp;được làm từ những lá hồng trà được tuyển chọn kỹ càng kết hợp&nbsp;với sữa mang đến ly trà sữa ngọt ngào, thanh mát.&nbsp;Sản phẩm được&nbsp;được sản xuất theo tiêu chuẩn Nhật Bản, an toàn cho sức khỏe, đảm bảo đạt các tiêu chuẩn về an toàn vệ sinh thực phẩm cho&nbsp;người sử dụng.</p><p><strong>3. Hướng dẫn sử dụng</strong></p><p>- Lắc đều trước khi dùng. Các thành phần của sản phẩm có thể lắng đọng bên dưới, nhưng hoàn toàn không ảnh hưởng đến chất lượng sản phẩm.</p><p>- Trà sữa Kirin ngon hơn khi uống lạnh.</p><p><strong>Lưu ý:</strong></p><p>- Bảo quản nơi thoáng mát. Tránh ánh nắng trực tiếp.</p><p>- Bảo quản&nbsp;trong tủ lạnh sau khi mở nắp chai và&nbsp;nhanh chóng sử dụng hết.</p><p><strong>4. Đối tượng sử dụng</strong></p><p>Trà sữa&nbsp;Kirin&nbsp;được đóng chai lớn 1.5L, thích hợp sử dụng trong các bữa tiệc, liên hoan hoặc sử dụng trong gia đình.</p>',
                ],
                [
                    'prd_code' => 'SP18',
                    'prd_name' => 'Gói Kẹo Dẻo EyeBalls 24 Viên',
                    'prd_type_id' => 2,
                    'prd_weigh' => 480,
                    'prd_source' => 'Mỹ',
                    'prd_price' => 125000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP18.png',
                    'prd_description' => '<p>Gói kẹo dẻo EyeBalls là sản phẩm đến từ thương hiệu Alli &amp; Rose, một trong những hãng sản xuất bánh kẹo lớn trên thế giới. Kẹo dẻo Eyeballs được thiết kế với hình dáng bên ngoài như một con mắt, đây là sản phẩm rất thích hợp dùng trong các dịp Halloween.</p><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0563/5745/4002/files/k_o_480x480.png?v=1667112489" alt=""></figure><p>Bên ngoài gói kẹo dẻo là phần kẹo mềm dai, ngọt nhẹ. Phần bên trong đẫm nhân sẽ giúp bạn có trải nghiệm thú vị với sản phẩm này. Hương vị ngọt kết hợp cùng nhân chua nhẹ bên trong sẽ cân bằng vị giác cho bạn khi thưởng thức.&nbsp;</p><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0563/5745/4002/files/H415d5cf28cd84a818b331d6f17065d76K_480x480.jpg?v=1667112530" alt=""></figure><p>Sản phẩm này được rất nhiều trẻ nhỏ yêu thích. Tuy nhiên, bởi vì bên ngoài của kẹo khá dính nên bạn cần chú ý khi cho bé sử dụng, tránh bị nghẹn.</p><p><strong>Hướng dẫn sử dụng:</strong> Dùng trực tiếp sau khi mở hộp.&nbsp;</p><p><strong>Hướng dẫn bảo quản: </strong>Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng mặt trời.</p><p><strong>Ngày sản xuất/ Hạn sử dụng:</strong> In trên bao bì</p><p><strong>Lưu ý:</strong> Cẩn trọng khi sử dụng cho bé.</p>',
                ],
                [
                    'prd_code' => 'SP19',
                    'prd_name' => 'Bánh Mochi Japanese Style Mixed Yuki & Love',
                    'prd_type_id' => 2,
                    'prd_weigh' => 300,
                    'prd_source' => 'Nhật Bản',
                    'prd_price' => 120000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP19.png',
                    'prd_description' => '<p>Bánh Mochi Japanese Style Mixed Yuki &amp; Love (300g) là loại bánh truyền thống của Nhật Bản, được làm theo phong cách chế biến hoàn toàn mới từ Đài Loan, bánh mochi&nbsp;Yuki &amp; Love đặc trưng bởi lớp vỏ bánh siêu dẻo dai, bọc lấy nhân ngọt thanh đậm vị bên trong vô cùng chất lượng, cuối cùng là lớp "bột" thơm nức phủ bên ngoài. Khi ăn nên cắn xuyên qua các lớp để cảm hết độ ngon tuyệt hảo.</p><p><strong>Mochi là gì?</strong></p><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0563/5745/4002/files/mochi-ice-cream-making-machine-b09213cc-2efd-43cf-8268-c4718d09860e_480x480.jpg?v=1625714468" alt=""></figure><p>Mochi là một loại bánh giầy nhân ngọt và là một loại bánh truyền thống nổi tiếng ở Nhật. Loại bánh này không chỉ xuất hiện trong đời sống thường ngày của người Nhật mà còn mang ý nghĩa thiêng liêng vào những ngày lễ, ngày Tết tại Nhật. Nó xuất hiện cách đây từ rất lâu, giữa thế kỉ 18, tại kinh thành Edo.</p><p>Hầu hết mọi công đoạn làm ra những chiếc bánh mochi được đầu tư rất tỉ mỉ bởi bàn tay lành nghề của thợ làm bánh.&nbsp; Bánh mochi hình tròn mô phỏng trăng tròn, biểu tượng cho sự viên mãn và sự sung túc, thịnh vượng.</p><p>Ngày nay Mochi phổ biến ở nhiều đất nước bởi vẻ ngoài “bụ bẫm” đáng yêu, hương vị thơm ngon mà không gây cảm giác ngán. Hơn nữa, các Đầu bếp bánh đã sáng tạo Mochi đa dạng về màu sắc lẫn hình dáng giúp những bức hình ẩm thực của người dùng trở nên “nghệ” hơn bao giờ hết.</p><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0563/5745/4002/files/banh_mochi_300g_vitamin_house_3_480x480.gif?v=1625714456" alt=""></figure><p>Là một trong những thương hiệu chuyên về mochi nổi tiếng nhất Đài Loan, sản phẩm của Yuki &amp; Love còn được ưa chuộng vô cùng tại Hongkong, Singpapore và Việt Nam những năm gần đây.</p><p>Bánh mochi nhân tổng hợp Yuki &amp; Love được làm hoàn toàn từ phương pháp thủ công, an toàn cho sức khỏe nên phù hợp với mọi đối tượng. Khi thưởng thức bánh, bạn sẽ cảm nhận được hương vị đặc biệt vừa truyền thống vừa hiện đại, cho bạn những trải nghiệm thú vị.&nbsp;Lớp vỏ bánh được làm từ bột mochiko nhập khẩu từ Nhật Bản, có hương vị và độ mềm dẻo đặc trưng, được phủ một lớp bột mịn bên ngoài. Bên trong lớp vỏ là nhân các loại củ, quả có độ ngọt vừa phải, khi ăn không bị ngán.</p><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://cdn.shopify.com/s/files/1/0563/5745/4002/files/banh_mochi_300g_vitamin_house_2_480x480.jpg?v=1625714445" alt=""></figure><p>Bánh Mochi Japanese Style Mixed Yuki &amp; Love (300g) được thiết kế với bao bì sang trọng, bắt mắt không những thích hợp dùng để ăn vặt mà còn phù hơp dùng để biếu tặng trong các dịp lễ.</p><p>Bánh Mochi Japanese Style Mixed Yuki &amp; Love (300g) gồm 12 bánh với các nhân là&nbsp; đậu đỏ, trà xanh và khoai môn</p><p><strong>Bảo quản:</strong></p><p>Bảo quản nơi khô ráo tránh ánh sáng trưc tiếp.</p><p>Bạn có thể bảo quản lạnh nếu sau khi mở nắp mà không sử dụng hết.</p><p><br>&nbsp;</p>',
                ],
                [
                    'prd_code' => 'SP20',
                    'prd_name' => 'Bánh trung thu Tai Thong Mooncake',
                    'prd_type_id' => 2,
                    'prd_weigh' => 500,
                    'prd_source' => 'Singapore',
                    'prd_price' => 350000,
                    'prd_discount' => 0,
                    'prd_image' => 'public/SP20.png',
                    'prd_description' => '<ul><li>Tai Thong Mooncake là thương hiệu bánh trung thu được kế thừa và thừa hưởng những tinh hoa ẩm thực lễ hội, chúng rất được ưa chuộng ở cả hai nước Singapore và Malaysia.&nbsp;</li><li>Thương hiệu thành công như hiện nay bắt đầu từ cửa hàng bánh nhỏ tại Singapore của ông Kwok Tai Ping gốc Hồng Kông chuyên các dòng bánh ngọt vị Quảng Đông. Chính nhờ được làm thủ công với hương vị riêng, được sản xuất tại nhà máy chính tại Malaysia đạt chứng nhận ISO 2000 và HACCP mà Tai Thong đã vươn tầm châu Á và chinh phục những thị trường lớn như Mỹ, Canada, Hàn Quốc,… .</li><li>Với kinh nghiệm hơn 100 năm thì Tai Thong không chỉ dừng lại ở dạng bánh nướng và bánh dẻo truyền thống mà còn sáng tạo đa dạng phong cách ẩm thực hơn khi tạo nên chiếc bánh trứng chảy và tuyết mềm thơm độc quyền, mới lạ.&nbsp;</li><li>Lớp vỏ bên ngoài mềm, dày chưa đến 2mm, chứa các đường nét hoa văn được phủ nhũ đồng đơn giản, không cầu kỳ mà vẫn sắc sảo cùng dạng hình tròn - biểu tượng cho vầng trăng đêm rằm.</li><li>Ngoài ra, những hoa văn trên bánh cũng thể hiện được nét bản sắc văn hóa Phương Đông mang lại trải nghiệm hoàn hảo và tinh tế cho mọi gia đình trong dịp Trung Thu</li><li>Trái với lớp vỏ mỏng thì bên trong lớp nhân dày với các thành phần thượng hạng được chọn lọc kỹ lưỡng, vị ngọt thanh nhờ sử dụng đường ăn kiêng, trái cây, Kibi Sato Nhật Bản, rất tốt cho sức khỏe. Đặc biệt sản phẩm cũng không sử dụng chất bảo quản hay các nguyên liệu tạo màu, tạo mùi.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li>Thương hiệu dù chỉ sử dụng các nguyên liệu tự nhiên quen thuộc như mật ong, bột mì nguyên cám, hạt điều, hạt chia, táo, gừng,… nhưng lại kết hợp để tạo nên một công thức cao cấp và độc đáo cho ngày Tết đoàn viên thêm ý nghĩa.</li></ul><figure class="image"><img width="400px" style="display:flex;margin-left:auto;margin-right:auto;" src="https://xachtaynhat.net/wp-content/uploads/2022/08/banh-trung-thu-taithong-rv.jpeg" alt="Bánh trung thu Lava Tai Thong &quot;gây sốt&quot; như thế nào?&nbsp;" srcset="https://xachtaynhat.net/wp-content/uploads/2022/08/banh-trung-thu-taithong-rv.jpeg 1340w, https://xachtaynhat.net/wp-content/uploads/2022/08/banh-trung-thu-taithong-rv-300x120.jpeg 300w, https://xachtaynhat.net/wp-content/uploads/2022/08/banh-trung-thu-taithong-rv-1024x408.jpeg 1024w, https://xachtaynhat.net/wp-content/uploads/2022/08/banh-trung-thu-taithong-rv-768x306.jpeg 768w" sizes="100vw" width="1340"></figure><p>Bộ lễ hộp Nguyệt Cát Tường nổi bật với hình ảnh đóa hoa Tulip Parrot - loài hoa vốn được biết với vẻ đẹp quyến rũ, tự tin và đầy kiêu hãnh. Lấy cảm hứng từ một chiếc túi xách sang trọng với gam màu đỏ chủ đạo, Nguyệt Cát Tường góp phần khẳng định phong cách sống của những người phụ nữ thời đại mới.&nbsp;</p><p>- Lava Trứng muối : 4pcs x 45gr</p><p>- Lava Trà Xanh: 2pcs x 45gr</p><p>- Lava Chocolate: 2pcs x 45gr</p>',
                ],
            ]
        );
    }
}
