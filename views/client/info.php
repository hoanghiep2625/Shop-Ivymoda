<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php $this->menu(); ?>
    <article class="mt-[90px]">
        <div class="flex gap-4 my-4">
            <div class="text-sm"><a href="?action=home">Trang chủ</a></div>
            <div class="text-sm">-</div>
            <div class="text-sm"> Tài khoản của tôi</div>
        </div>
        <hr class="mb-8">
        <div class="grid grid-cols-[1.2fr_5fr] gap-36">
            <?php require_once "partials/menupro5.php" ?>
            <div>
                <div class="font-semibold text-2xl mb-4">TÀI KHOẢN CỦA TÔI</div>
                <div class="border border-blue-300 bg-blue-200 p-2 rounded-lg text-blue-900">"Vì chính sách an toàn thẻ, bạn không thể thay đổi SĐT, Ngày sinh, Họ tên. Vui lòng liên hệ CSKH 0905898683 để được hỗ trợ"</div>
                <div class="grid grid-cols-[2fr_1fr] gap-8 my-10">
                    <div class="grid grid-cols-[1fr_2.5fr] gap-4">
                        <div class="grid grid-rows-6 gap-4">
                            <p class="p-4">Họ</p>
                            <p class="p-4">Tên</p>
                            <p class="p-4">Số điện thoại</p>
                            <p class="p-4">Email</p>
                            <p class="p-4">Giới tính</p>
                            <p class="p-4">Ngày sinh</p>
                        </div>
                        <div class="grid grid-rows-6 gap-4">
                            <input type="text" value="<?= $user['first_name'] ?>" class="border p-3 rounded-md text-[14px] font-semibold bg-gray-200 opacity-50" disabled>
                            <input type="text" value="<?= $user['name'] ?>" class="border p-3 rounded-md text-[14px] font-semibold bg-gray-200 opacity-50" disabled>
                            <input type="text" value="<?= $user['phone'] ?>" class="border p-3 rounded-md text-[14px] font-semibold bg-gray-200 opacity-50" disabled>
                            <input type="text" value="<?= $user['email'] ?>" class="border p-3 rounded-md text-[14px]">
                            <div class="flex gap-2 items-center">
                                <div class="mr-8">
                                    <input type="radio" name="gender" id="male" <?php echo $user['sex'] == 1 ? 'checked' : ''; ?>>
                                    <label for="male">Nam</label>
                                </div>
                                <div class="mr-8">
                                    <input type="radio" name="gender" id="female" <?php echo $user['sex'] == 2 ? 'checked' : ''; ?>>
                                    <label for="female">Nữ</label>
                                </div>
                                <div>
                                    <input type="radio" name="gender" id="other" <?php echo $user['sex'] == 3 ? 'checked' : ''; ?>>
                                    <label for="other">Khác</label>
                                </div>

                            </div>
                            <input type="text" value="<?= $user['date'] ?>" class="border p-3 rounded-md text-[14px] font-semibold bg-gray-200 opacity-50" disabled>

                        </div>

                    </div>
                    <div>
                        <div class="text-xl font-semibold mb-4">Đổi mật khẩu</div>
                        <p class="text-[14px] font-semibold <?php echo (isset($thanhcong) && $thanhcong != '') ? '' : 'hidden'; ?>" style="color:green">Đổi mật khẩu thành công</p>
                        <form action="?action=changepassword" method="POST">
                            <div class="border h-11 flex items-center p-4 relative mb-4 rounded-lg <?php if (isset($thatbai) && $thatbai != '') {
                                                                                                        echo 'border-red-500';
                                                                                                    } ?>">
                                <input type="password" id="oldpassword" name="oldpassword" placeholder="Mật khẩu cũ" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0">
                                <p id="oldpassword-error" class="text-red-500 text-[10px] absolute right-2 w-80% bg-white  <?php if ($thatbai == '') echo 'hidden'; ?> bottom-[-6px]">Mật khẩu cũ không chính xác</p>
                            </div>
                            <div class="border h-11 flex items-center p-4 relative mb-4 rounded-lg">
                                <input type="password" id="newpassword" name="newpassword" placeholder="Mật khẩu mới" value="<?php if (isset($newpassword) && $newpassword != '') {
                                                                                                                                    echo $newpassword;
                                                                                                                                } ?>" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0">
                                <p id="newpassword-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                            </div>
                            <div class="border h-11 flex items-center p-4 relative rounded-lg">
                                <input type="password" id="renewpassword" name="renewpassword" placeholder="Nhập lại mật khẩu mới" value="<?php if (isset($newpassword) && $newpassword != '') {
                                                                                                                                                echo $newpassword;
                                                                                                                                            } ?>" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0">
                                <p id="renewpassword-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="border border-black rounded-tl-[15px] rounded-br-[15px] w-full h-[50px] flex justify-center items-center hover:bg-black hover:text-white transition-all duration-300">
                                    <button type="submit" class="font-semibold">ĐỔI MẬT KHẨU</button>
                                </a>
                            </div>
                        </form>

                    </div>
                    <div>
                        <p class="
            bg-black
            w-68
            h-[50px]
            rounded-tl-2xl rounded-br-2xl
            flex
            items-center
            justify-center text-white font-semibold hover:bg-white hover:text-black hover:border hover:border-black cursor-pointer transition-all duration-300
          ">CẬP NHẬT</p>
                    </div>
                </div>

            </div>
        </div>
    </article>
    <hr>
    <script src="views/client/js/validatechangepass.js"></script>
    <script src="views/client/js/changecolormenupro5.js"></script>
</body>
<?php require_once "partials/footer.php" ?>

</html>