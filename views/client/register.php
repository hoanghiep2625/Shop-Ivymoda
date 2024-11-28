<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "partials/menu.php" ?>
    <article class="h-auto">
        <div class="flex justify-center">
            <p class="font-semibold text-2xl pt-4">ĐĂNG KÝ</p>
        </div>
        <div class="grid grid-cols-2 ">
            <!-- Cột trái -->
            <div class="flex flex-col">
                <p class="font-[500] text-[1rem] py-4">Thông tin khách hàng</p>
                <form id="registerForm" action="?action=register" method="POST" onsubmit="return validateForm()">
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p>Họ: <span class="text-red-500">*</span></p>
                            <div id="ho" class="border w-[98%] h-11 flex items-center p-4 mb-6 relative">
                                <input type="text" placeholder="Họ.." id="inho" name="inho" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" value="<?php echo !empty($ho) ? $ho : ''; ?>">
                                <p id="ho-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                            </div>
                        </div>
                        <div>
                            <p>Tên: <span class="text-red-500">*</span></p>
                            <div id="ten" class="w-[98%] border h-11 flex items-center p-4 mb-6 relative">
                                <input type="text" placeholder="Tên.." id="inten" name="inten" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" value="<?php echo !empty($ten) ? $ten : ''; ?>">
                                <p id="ten-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p>Email: <span class="text-red-500">*</span></p>
                            <div id="email" class="border w-[98%] h-11 flex items-center p-4 mb-6 relative
        <?php if ($thatbai == 1) echo 'border-red-500'; ?>">
                                <input type="text" placeholder="Email.." id="inemail" name="inemail" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" value="<?php echo !empty($email) ? $email : ''; ?>">
                                <p id="email-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white <?php if ($thatbai != 1) echo 'hidden'; ?>">Email đã tồn tại</p>
                            </div>
                        </div>

                        <div>
                            <p>Điện thoại: <span class="text-red-500">*</span></p>
                            <div id="sodt" class="w-[98%] border h-11 flex items-center p-4 mb-6 relative <?php if ($thatbai == 2) echo 'border-red-500'; ?>">
                                <input type="text" placeholder="Điện thoại.." id="inphone" name="inphone" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" value="<?php echo !empty($sodt) ? $sodt : ''; ?>">
                                <p id="sodt-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white <?php if ($thatbai != 2) echo 'hidden'; ?>">Số điện thoại đã tồn tại</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p>Ngày sinh: <span class="text-red-500">*</span></p>
                            <div id="ngaysinh" class="border w-[98%] h-11 flex items-center p-4 mb-6 relative">
                                <input type="date" id="indate" name="indate" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" value="<?php echo !empty($ngaysinh) ? $ngaysinh : ''; ?>">
                                <p id="ngaysinh-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                            </div>
                        </div>
                        <div>
                            <p>Giới tính: <span class="text-red-500">*</span></p>
                            <div id="gioitinh" class="w-[98%] border h-11 flex items-center p-4 mb-6 relative">
                                <select id="insex" name="insex" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0">
                                    <option value="1" <?php if (!empty($gioitinh) && $gioitinh == '1') echo 'selected'; ?>>Nam</option>
                                    <option value="2" <?php if (!empty($gioitinh) && $gioitinh == '2') echo 'selected'; ?>>Nữ</option>
                                    <option value="3" <?php if (!empty($gioitinh) && $gioitinh == '3') echo 'selected'; ?>>Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p>Tỉnh/Tp: <span class="text-red-500">*</span></p>
                            <div id="tinhthanh" class="border w-[98%] h-11 flex items-center p-4 mb-6 relative">
                                <select class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" id="city" aria-label=".form-select-sm" name="city">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                                <p id="tinhthanh-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                            </div>
                        </div>
                        <div>
                            <p>Quận/Huyện: <span class="text-red-500">*</span></p>
                            <div id="quanhuyen" class="w-[98%] border h-11 flex items-center p-4 mb-6 relative">
                                <select id="district" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" aria-label=".form-select-sm" name="district">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                                <p id="quanhuyen-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                            </div>
                        </div>
                    </div>
                    <p>Phường/Xã: <span class="text-red-500">*</span></p>
                    <div id="phuongxa" class="border w-[99%] h-11 flex items-center p-4 mb-4 relative">
                        <select id="ward" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" aria-label=".form-select-sm" name="ward">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                        <p id="phuongxa-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                    </div>
                    <div>
                        <p>Địa chỉ: <span class="text-red-500">*</span></p>
                        <div id="diachi" class="border w-[99%] h-[80px] flex items-center p-4 mb-6 relative">
                            <input type="text" id="inaddress" class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" name="inaddress" value="<?php echo !empty($diachi) ? $diachi : ''; ?>">
                            <p id="diachi-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                        </div>
                    </div>
            </div>

            <!-- Cột phải -->
            <div class="flex flex-col pl-10">
                <p class="font-[500] text-[1rem] py-4">Thông tin mật khẩu</p>
                <div>
                    <p>Mật khẩu: <span class="text-red-500">*</span></p>
                    <div id="password" class="w-[100%] border h-11 flex items-center p-4 mb-6 relative">
                        <input type="password" id="inpassword" name="inpassword" placeholder="Mật khẩu.." class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" value="<?php echo !empty($password) ? $password : ''; ?>">
                        <p id="password-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                    </div>
                </div>
                <div>
                    <p>Nhập lại mật khẩu: <span class="text-red-500">*</span></p>
                    <div id="xacnhanpassword" class="w-[100%] border h-11 flex items-center p-4 mb-6 relative">
                        <input type="password" id="inrepass" name="inrepass" placeholder="Nhập lại mật khẩu.." class="text-[14px] outline-none w-full border-0 focus:outline-none focus:ring-0" value="<?php echo !empty($password) ? $password : ''; ?>">
                        <p id="xacnhanpassword-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="agree-terms" class="mr-2" checked disabled>
                    <p class="text-[14px]">Đồng ý với các <a href="#" class="text-red-500">điều khoản</a> của IVY</p>
                </div>

                <br>
                <div class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    <p class="text-[14px]">Đăng ký nhận bản tin</p>
                </div>
                <div>
                    <input type="submit" name="register" class=" border border-black text-white font-semibold text-lg bg-black w-[100%] p-3 flex justify-center items-center rounded-br-2xl rounded-tl-2xl my-8 cursor-pointer hover:bg-white hover:text-black hover:border hover:border-black" value="Đăng Ký">
                    <a href="?action=showFormlogin" class="border border-black text-black font-semibold text-lg bg-white w-[100%] p-3 flex justify-center items-center rounded-br-2xl rounded-tl-2xl my-8 cursor-pointer hover:bg-black hover:text-white hover:border hover:border-white">Quay lại trang đăng nhập</a>
                </div>
            </div>
        </div>
        </form>

    </article>

    <hr />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="views/client/js/address.js"></script>
    <script src="views/client/js/validatereg.js"></script>
</body>
<?php require_once "partials/footer.php" ?>

</html>