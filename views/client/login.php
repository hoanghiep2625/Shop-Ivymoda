<?php require_once "./includes/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "./includes/menu.php" ?>
    <article class="h-auto mx-[8%]">
        <div class="grid grid-cols-[1fr_0.3fr_1fr] ">
            <!-- Cột trái -->
            <form action="?action=login" method="POST" id="loginForm" onsubmit="return validateForm()">
                <div class="flex flex-col items-center">
                    <p class="font-semibold text-xl py-4">Bạn đã có tài khoản IVY</p>
                    <div class="mb-5 text-center relative">
                        <p class="text-[14px] text-gray-500 mb-[10px]">
                            Nếu bạn đã có tài khoản, hãy đăng nhập để tích luỹ điểm thành viên và nhận được những ưu đãi tốt hơn!
                        </p>
                        <p class="flex text-red-500 text-[10px] absolute left-1/2 w-100% transform -translate-x-1/2 <?php if ($thatbai == '') echo 'hidden'; ?>">
                            Tài khoản hoặc mật khẩu không chính xác
                        </p>
                    </div>

                    <div class="border w-[80%] h-11 flex items-center p-4 mb-6 mt-6 relative <?php if (isset($username) && $username != '') {
                                                                                                    echo 'border-red-500';
                                                                                                } ?>">
                        <input name="username" id="username" type="text" placeholder="Email/SĐT" value="<?php if (isset($username) && $username != '') {
                                                                                                            echo $username;
                                                                                                        } ?>" class="text-[14px] outline-none w-full">
                        <p id="username-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                    </div>
                    <div class="border w-[80%] h-11 flex items-center p-4 relative <?php if (isset($password) && $password != '') {
                                                                                        echo 'border-red-500';
                                                                                    } ?>">
                        <input name="password" id="password" type="password" placeholder="Mật khẩu" value="<?php if (isset($password) && $password != '') {
                                                                                                                echo $password;
                                                                                                            } ?>" class="text-[14px] outline-none w-full">
                        <p id="password-error" class="text-red-500 text-[10px] absolute right-2 bottom-[-6px] w-80% bg-white hidden"></p>
                    </div>
                    <div class="flex justify-between items-center my-4 w-[80%]">
                        <div class="flex items-center">
                            <input type="checkbox" class="mr-2">
                            <p class="text-[14px]">Ghi nhớ đăng nhập</p>
                        </div>
                        <p class="underline text-[14px] cursor-pointer hover:text-orange-600">Quên mật khẩu?</p>
                    </div>
                    <div class="flex justify-between items-center w-[80%]">
                        <p class="underline cursor-pointer text-[14px] hover:text-orange-600">Đăng nhập bằng mã QR</p>
                        <p class="underline cursor-pointer text-[14px] hover:text-orange-600">Đăng nhập bằng OTP</p>
                    </div>
                    <input type="submit" name="login" class="text-white font-semibold text-lg bg-black w-[80%] p-3 h-[50px] text-center rounded-br-2xl border border-black rounded-tl-2xl my-8 hover:bg-white hover:border hover:border-black hover:text-black cursor-pointer" value="Đăng nhập">
                </div>
            </form>
            <!-- Đường viền ở giữa hai cột -->
            <div class="flex items-center justify-center">
                <div class="w-[1px] h-full bg-gray-300"></div>
            </div>

            <!-- Cột phải -->
            <div class="flex flex-col items-center px-10">
                <p class="font-semibold text-xl py-4">Khách hàng mới của IVY moda</p>
                <p class="text-gray-500 text-center text-[14px] mb-2">Nếu bạn chưa
                    có tài khoản trên ivymoda.com, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký.</p>
                <p class="text-gray-500 text-center text-[14px]">Bằng cách cung cấp cho IVY moda thông tin chi tiết của
                    bạn, quá trình mua hàng trên ivymoda.com sẽ là một trải nghiệm
                    thú vị và nhanh chóng hơn!</p>

                <a class="text-white font-semibold h-[50px] border border-black text-lg bg-black w-[100%] p-3 flex justify-center items-center rounded-br-2xl rounded-tl-2xl my-8 hover:bg-white hover:border hover:border-black hover:text-black" href="?action=showFormreg">
                    Đăng ký
                </a>

            </div>
        </div>
    </article>

    <hr />
</body>
<script src="./includes/js/validatelogin.js"></script>
<?php require_once "./includes/footer.php" ?>

</html>