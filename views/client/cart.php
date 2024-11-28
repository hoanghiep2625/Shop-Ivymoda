<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "partials/menu.php" ?>
    <hr>
    <div class="flex gap-4 mb-[20px] mt-[90px] ">
        <div class="text-sm">Trang chủ</div>
        <div class="text-sm">-</div>
        <div class="text-sm"> Q&A</div>
    </div>
    <hr class="mb-10">
    <div class="mt-[10px] flex">
        <img src="./public/image/Q&A.jpg" alt="">
    </div>
    <hr class="mb-10">
    <article class="grid grid-cols-[1.5fr_1.5fr] gap-10">
        <div>
            <div class="border w-[750px] h-[96.6px] flex justify-center rounded-tl-[20px] rounded-br-[20px] ">
                <div class="w-[14px] h-[14px] rounded border-2 border-[#e7e8e9] rounded-full bg-black mt-6 z-10 relative">
                    <p class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Giỏ hàng
                    </p>
                </div>
                <div class=" h-[3px] w-[250px] bg-[#e7e8e9] mx-2 mt-[30px]"></div>
                <div class="w-[14px] h-[14px] rounded rounded-full bg-white border-2 border-[#e7e8e9] mt-6 z-10 relative">
                    <div class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Đặt hàng
                    </div>
                </div>
                <div class=" h-[3px] w-[250px] bg-[#e7e8e9] mx-2 mt-[30px]"></div>
                <div class="w-[14px] h-[14px] rounded rounded-full bg-white border-2 border-[#e7e8e9]  mt-6 z-10 relative">
                    <div class="text-[12px] mt-4 left-[-40px] w-28 absolute ">
                        Hoàn thành đơn
                    </div>
                </div>
            </div>
            <div class="flex gap-2">
                <div class="text-[24px] font-semibold">
                    Giỏ hàng của bạn
                </div>
                <div>

                </div>
                <div class="text-[24px] text-[#d73831] font-semibold">
                    Sản Phẩm
                </div>
            </div>
            <div>
                <a class="bg-white border border-black w-[250px] transition-all  pt-[14px] pr-[24px] pb-[14px] pl-[24px] rounded-tl-[20px] rounded-br-[20px] hover:bg-black hover:text-white flex "
                    href="#">
                    <div class="mx-auto">
                        Tiếp tục mua hàng
                    </div>
                </a>
            </div>
        </div>
        <div>
            <div class="bg-[#fbfbfc] p-[22px] w-[370px]">
                <div class="text-[20px] text-[#221F20]">
                    Tổng tiền giỏ hàng
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    Tổng sản phẩm
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    Tổng tiền hàng
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    Thành tiền
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    Tạm tính
                </div>
                <div class="text-[14px] text-[#AC2F33] mt-6">
                    Sản phẩm nằm trong chương trình đồng giá, giảm giá trên 50% không hỗ trợ đổi trả
                </div>
                <hr>
            </div>
            <div>
                <a href="#"
                    class="bg-black border border-black text-white font-semibold transition-all hover:bg-white hover:text-black
                hover:border border-black  w-[370px]  pt-[14px] pr-[24px] pb-[14px] pl-[24px] rounded-tl-[20px] rounded-br-[20px]  flex ">
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