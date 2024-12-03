<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "partials/menu.php" ?>
    <article class="grid grid-cols-[4fr_1.5fr] gap-10 mt-4">
        <div>
            <div class="border w-full h-[96.6px] flex justify-center rounded-tl-[20px] rounded-br-[20px] ">
                <div
                    class="w-[14px] h-[14px] border-2 border-[#e7e8e9] rounded-full bg-black mt-6 z-10 relative">
                    <p class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Giỏ hàng
                    </p>
                </div>
                <div class=" h-[3px] w-[320px] bg-[#e7e8e9] mx-2 mt-[30px]"></div>
                <div
                    class="w-[14px] h-[14px] rounded-full bg-white border-2 border-[#e7e8e9] mt-6 z-10 relative">
                    <div class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Đặt hàng
                    </div>
                </div>
                <div class=" h-[3px] w-[320px] bg-[#e7e8e9] mx-2 mt-[30px]"></div>
                <div
                    class="w-[14px] h-[14px] rounded-full bg-white border-2 border-[#e7e8e9]  mt-6 z-10 relative">
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
                    <div class="border p-6 rounded-tl-[28px] rounded-br-[28px]">
                        <div class="flex justify-between">
                            <div class="text-base font-semibold ">Lâm</div>
                            <div class="flex gap-4">
                                <div class="text-[14px] underline ">
                                    Chọn địa chỉ khác
                                </div>
                                <div>
                                    <a class="py-[10px] px-[16px] border border-black text-white bg-black rounded-tl-[20px] rounded-br-[20px] mt-8 hover:text-black hover:bg-white    "
                                        href="">Mặc định</a>
                                </div>
                            </div>
                        </div>
                        <div class="py-2">
                            Điện thoại:
                            0379924549
                        </div>
                        <div class="py-2">
                            Địa chỉ:đống chanh, Minh Cường, Thường Tín, Hà Nội
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
                            <?= $totalproduct ?>
                        </div>
                    </div>
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Tạm tính</div>
                        <div>
                            <?= number_format($tong, 0, ',', '.') ?> đ
                        </div>
                    </div>
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Phí vận chuyển</div>
                        <div class="font-semibold">
                            <?= number_format($tong, 0, ',', '.') ?> đ
                        </div>
                    </div>
                </div>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between py-4">
                        <div>Tiền thanh toán</div>
                        <div class="font-semibold">
                            <?= number_format($tong, 0, ',', '.') ?> đ
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
                <div class="right-[20px]">
                    <a href="#"
                        class="bg-black border border-black text-white font-semibold transition-all hover:bg-white hover:text-black
                    hover:border border-black  w-[356px]  pt-[14px] pr-[24px] pb-[14px] pl-[24px] rounded-tl-[20px] rounded-br-[20px] flex ">
                        <div class="mx-auto">
                            ĐẶT HÀNG
                        </div>
                    </a>
                </div>
            </div>
    </article>
    <hr class="mt-10">

</body>
<?php require_once "partials/footer.php" ?>

</html>