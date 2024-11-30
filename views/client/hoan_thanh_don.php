<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "partials/menu.php" ?>

    <article class="mt-[90px] grid grid-cols-[4fr_1.5fr] gap-10 min-h-[350px]">
        <div>
            <div class="border w-full h-[96.6px] flex justify-center rounded-tl-[20px] rounded-br-[20px] ">
                <div
                    class="w-[14px] h-[14px] rounded border-2 border-[#e7e8e9] rounded-full bg-black mt-6 z-10 relative">
                    <p class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Giỏ hàng
                    </p>
                </div>
                <div class=" h-[3px] w-[320px] bg-black mx-2 mt-[30px]"></div>
                <div
                    class="w-[14px] h-[14px] rounded rounded-full bg-black border-2 border-[#e7e8e9] mt-6 z-10 relative">
                    <div class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Đặt hàng
                    </div>
                </div>
                <div class=" h-[3px] w-[320px] bg-[#e7e8e9] mx-2 mt-[30px]"></div>
                <div
                    class="w-[14px] h-[14px] rounded rounded-full bg-white border-2 border-[#e7e8e9]  mt-6 z-10 relative">
                    <div class="text-[12px] mt-4 left-[-40px] w-28 absolute ">
                        Hoàn thành đơn
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-[1.5fr_1.25fr] gap-10">
                <div>
                    <div class="text-[20px] font-semibold p-6">
                        Địa chỉ giao hàng
                    </div>
                    <div class="border p-8 rounded-tl-[28px] rounded-br-[28px]">
                        <div class="flex justify-between">
                            <div class="text-base font-semibold "><?= $user['first_name'] . ' ' . $user['name'] ?></div>
                            <div class="flex gap-4">
                                <div class="text-[14px] underline ">
                                    Chọn địa chỉ khác
                                </div>
                                <div>
                                    <a class="py-[10px] px-[16px] border border-black text-white bg-black rounded-tl-[20px] rounded-br-[20px] mt-8 hover:text-black hover:bg-white transition duration-300"
                                        href="">Mặc định</a>
                                </div>
                            </div>
                        </div>
                        <div class="py-2 text-sm">
                            Điện thoại:
                            <?= $user['phone'] ?>
                        </div>
                        <div class="pt-2 text-sm">
                            Địa chỉ:<?= $address ?>, <?= $commune_name ?>, <?= $district_name ?>, <?= $city_name ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="text-[20px] font-semibold p-6">Phương thức giao hàng</div>
                    <div class="border p-8 rounded-tl-[25px] rounded-br-[25px]">
                        <div class="flex gap-2">
                            <div class="w-3 h-3 rounded-full bg-black mt-[6px]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                </svg>
                            </div>
                            <div class="text-[14px] font-semibold">Chuyển phát nhanh</div>
                        </div>
                        <div class="text-xs mt-4 ml-6 w-full">
                            Thời gian giao hàng dự kiến: Thứ 2, 02/12/2024
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="bg-[#fbfbfc] p-[22px] w-[400px]">
                <div class="text-[20px] text-[#221F20]">
                    Tóm tắt đơn hàng
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Tổng tiền hàng</div>
                        <div>
                            <?= number_format($totalPrice, 0, ',', '.') ?> đ
                        </div>
                    </div>
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Tạm tính</div>
                        <div>
                            <?= number_format($totalPrice, 0, ',', '.') ?> đ
                        </div>
                    </div>
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Phí vận chuyển</div>
                        <div class="font-semibold">
                            0 đ
                        </div>
                    </div>
                </div>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between py-4">
                        <div>Tiền thanh toán</div>
                        <div class="font-semibold">
                            <?= number_format($totalPrice, 0, ',', '.') ?> đ
                        </div>
                    </div>
                </div>
                <hr>
                <!--<div class="flex justify-between p-4">
                    <div class="text-base text-[#3E3E3F] font-semibold">
                        Mã phiếu giảm giá
                    </div>
                    <div class="bg-[#6C6D70] w-[1px] h-[24px]">
                    </div>
                    <div class="font-base font-semibold text-[#939598]">
                        Mã của tôi
                    </div>
                </div>
                <div class="justify-between flex gap-4 ">
                    <div class="w-[256px] h-[48px] border border-2-gray rounded ">
                        <input class="p-[12px] w-full h-full" type="text" name="" id="" placeholder="Mã giảm giá">
                    </div>
                    <div class="w-[120px] h-[46px] border border-black p-[11px] font-semibold rounded-tl-[15px] rounded-br-[15px] hover:text-white hover:bg-black">
                        <a href="">ÁP DỤNG</a>
                   </div>
                </div>
                <div class=" w-[375px] h-[48px] border border-2-gray rounded mt-2 ">
                    <input type=" text" class="p-[12px] w-full h-full" placeholder="Mã nhân viên hỗ trợ">
                    </div>
                </div>-->

            </div>
            <div class="right-[20px]">
                <a href="?action=placeOrder"
                    class="bg-black border border-black text-white font-semibold transition-all hover:bg-white hover:text-black
        hover:border w-full pt-[14px] pr-[24px] pb-[14px] pl-[24px] rounded-tl-[20px] rounded-br-[20px] flex cursor-pointer">
                    <div class="mx-auto">
                        HOÀN THÀNH
                    </div>
                </a>
            </div>
        </div>
        <div>
            <div class="pb-6">
                <div class="border w-[52.5%] p-8 rounded-tl-[25px] rounded-br-[25px]">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-black mt-[6px]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#ffffff"
                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                            </svg>
                        </div>
                        <div class="text-[14px] font-semibold">Phương thức thanh toán</div>
                    </div>
                    <div class="text-xs mt-4 ml-6 pr-4 w-full">
                        Hiện tại chúng tôi chỉ hỗ trợ phương thức thanh toán khi nhận hàng để đảm bảo quyền lợi cho khách hàng
                    </div>
                </div>
            </div>
            <div class="text-[20px] font-semibold px-6 pb-6">Danh sách sản phẩm</div>
            <div>
                <table class="w-full bg-white table-auto border-collapse">
                    <thead class="border-b bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Ảnh sản phẩm</th> <!-- Cột ảnh -->
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tên sản phẩm</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Số lượng</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Size</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $item): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img src="<?= $this->WebModel->getMainProductImage($item['id']) ?>" alt="Image" class="w-28 h-[140px] object-cover rounded">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?= $item['name']; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?= $item['quantity'] ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?= $item['size']; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700" id="totalPriceProduct-<?= $item['cart_id']; ?>">
                                    <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') . ' đ'; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </article>
    <hr>
</body>
<?php require_once "partials/footer.php" ?>

</html>