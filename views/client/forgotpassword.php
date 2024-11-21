<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "partials/menu.php" ?>
    <hr>
    <article class="text-center">
        <div class="">
            <div class="text-[20px] text-[#221F20] font-semibold mt-4">
                Bạn muốn tìm lại mật khẩu?
            </div><br>
            <div class="text-[#6C6D70] text-[16px]">
                Vui lòng nhập lại email đã đăng ký, hệ thống của chúng tôi sẽ gửi cho bạn 1 đường dẫn để thay đổi mật
                khẩu.
            </div><br>
            <form action="" method="post" class="">
                <div>
                    <input class="p-[15px] border border-[#ced4da] w-[400px] rounded text-[1rem] " type="text" name=""
                        placeholder="Số điện thoại" id="" required>
                </div><br>
                <div>
                    <input class="p-[15px] border border-[#ced4da] w-[400px] rounded text-[1rem]" type="text" name=""
                        placeholder="Nhập kí tự trong hình vào ô sau" id="" required>
                </div><br>
                <div>
                    <button
                        class="px-6 py-3 w-[400px] border mb-4 border-black rounded-br-[20px] rounded-tl-[20px] font-semibold text-[20px] bg-black text-white hover:bg-white hover:text-black"><a
                            href="">GỬI ĐI</a></button>
                </div>
            </form>
        </div>
    </article>
    <hr>
</body>
<?php require_once "partials/footer.php" ?>

</html>