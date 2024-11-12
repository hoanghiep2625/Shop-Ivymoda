<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM6hHlhkZ60Y1bVTrj1BoCqGbIc5jk8K3cf5bTp" crossorigin="anonymous" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        font-family: "Montserrat", sans-serif;
    }
</style>

<body class="mx-[8%]">
    <header class="flex justify-between items-center py-4 bg-white">
        <div class="flex items-center">
            <a href="#" class="text-sm font-semibold text-gray-800 mr-4 hover:text-red-500">NỮ</a>
            <a href="#" class="text-sm font-semibold text-gray-800 mr-4 hover:text-red-500">NAM</a>
            <a href="#" class="text-sm font-semibold text-gray-800 mr-4 hover:text-red-500">TRẺ EM</a>
            <a href="#" class="text-sm font-semibold text-[rgb(255,0,0)] mr-4">THÁNG VÀNG SĂN SALE</a>

            <a href="#" class="text-sm font-semibold text-gray-800 mr-4 hover:text-red-500">BỘ SƯU TẬP</a>
            <a href="#" class="text-sm font-semibold text-gray-800 hover:text-red-500">VỀ CHÚNG TÔI</a>
        </div>
        <div class="flex items-center">
            <a href="#"><img src="./public/image/logo.png" alt="Logo" class="w-32 h-auto" /></a>
        </div>
        <div class="flex items-center">
            <div class="w-80 h-9 border">
                <div class="flex py-2 px-2">
                    <img src="./public/icon/search.svg" alt="" class="w-4 h-auto" />
                    <input type="text" placeholder="TÌM KIẾM SẢN PHẨM" class="text-sm outline-none pl-2" />
                </div>
            </div>
            <a href="#" class="ml-4"><img src="./public/icon/headphone.svg" alt="Headphone" class="w-5 h-auto" /></a>
            <a href="#" class="ml-4"><img src="./public/icon/user.svg" alt="User" class="w-5 h-auto" /></a>
            <a href="#" class="ml-4 mr-8"><img src="./public/icon/cart.svg" alt="Cart" class="w-5 h-auto" /></a>
        </div>
    </header>
    <hr />
    <article class="h-auto mx-[8%]">
        <div class="grid grid-cols-[1fr_0.3fr_1fr] ">
            <!-- Cột trái -->
            <div class="flex flex-col items-center">
                <p class="font-semibold text-xl py-4">Bạn đã có tài khoản IVY</p>
                <div class="mb-5 text-center">
                    <p class="text-[14px] text-gray-500">
                        Nếu bạn đã có tài khoản, hãy đăng nhập để tích luỹ điểm thành viên và nhận được những ưu đãi tốt
                        hơn!
                    </p>
                </div>
                <div class="border w-[80%] h-11 flex items-center p-4 mb-6">
                    <input type="text" placeholder="Email/SĐT" class="text-[14px] outline-none w-full">
                </div>
                <div class="border w-[80%] h-11 flex items-center p-4">
                    <input type="password" placeholder="Mật khẩu" class="text-[14px] outline-none w-full">
                </div>
                <div class="flex justify-between items-center my-4 w-[80%]">
                    <div class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <p class="text-[14px]">Ghi nhớ đăng nhập</p>
                    </div>
                    <p class="underline text-[14px] cursor-pointer">Quên mật khẩu?</p>
                </div>
                <div class="flex justify-between items-center w-[80%]">
                    <p class="underline cursor-pointer text-[14px]">Đăng nhập bằng mã QR</p>
                    <p class="underline cursor-pointer text-[14px]">Đăng nhập bằng OTP</p>
                </div>
                <div class="bg-black w-[70%] p-3 flex justify-center items-center rounded-br-2xl rounded-tl-2xl my-8">
                    <a href="#">
                        <p class="text-white font-semibold text-lg">Đăng nhập</p>
                    </a>
                </div>
            </div>

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
                <div class="bg-black w-[100%] p-3 flex justify-center items-center rounded-br-2xl rounded-tl-2xl my-8">
                    <a href="?action=showformreg">
                        <p class="text-white font-semibold text-lg">Đăng ký</p>
                    </a>
                </div>
            </div>
        </div>
    </article>

    <hr />
</body>
<footer class="w-full px-0 mx-0">
    <div class="grid grid-cols-[1fr_2fr_1fr] gap-12 mt-12">
        <div class="col-span-1">
            <div class="flex justify-between items-center">
                <img src="./public/image/logo.png" alt="" class="w-28 h-auto mr-4" />
                <img src="./public/image/dmca.png" alt="" class="w-15 h-5 mr-4" />
                <img src="./public/image/congthuong.png" alt="" class="w-15 h-8" />
            </div>
            <div class="grid grid-cols-5 py-5 flex items-center">
                <img src="./public/image/ic_fb.svg" class="w-3 h-auto" alt="" />
                <img src="./public/image/ic_gg.svg" class="w-5 h-auto" alt="" />
                <img src="./public/image/ic_instagram.svg" class="w-5 h-auto" alt="" />
                <img src="./public/image/ic_pinterest.svg" class="w-5 h-auto" alt="" />
                <img src="./public/image/ic_ytb.svg" class="w-5 h-auto" alt="" />
            </div>
            <div class="
            bg-black
            w-56
            h-12
            rounded-tl-2xl rounded-br-2xl
            flex
            items-center
            justify-center
          ">
                <p class="text-white text-sm font-[700]">HOTLINE: 0353 608 533</p>
            </div>
        </div>
        <div class="grid grid-cols-[2fr_3fr_1fr] gap-4">
            <div>
                <p class="font-semibold text-2xl pb-2">Giới thiệu</p>
                <p class="font-[300] text-sm py-2">Về IVY moda</p>
                <p class="font-[300] text-sm py-2">Tuyển dụng</p>
                <p class="font-[300] text-sm py-2">Hệ Thống cửa hàng</p>
            </div>
            <div>
                <p class="font-semibold text-2xl pb-2">Dịch vụ khách hàng</p>
                <p class="text-sm py-2 font-[300]">Chính sách điều khoản</p>
                <p class="text-sm py-2 font-[300]">Hướng dân mua hàng</p>
                <p class="text-sm py-2 font-[300]">Chính sách thanh toán</p>
                <p class="text-sm py-2 font-[300]">Chính sách đổi trả</p>
                <p class="text-sm py-2 font-[300]">Chính sách bảo hàng</p>
                <p class="text-sm py-2 font-[300]">
                    Chính sách giao nhận vận chuyển
                </p>
                <p class="text-sm py-2 font-[300]">Chính sách thẻ thành viên</p>
                <p class="text-sm py-2 font-[300]">Q&A</p>
            </div>
            <div>
                <p class="font-semibold text-2xl pb-2">Liên Hệ</p>
                <p class="text-sm py-2 font-[300]">Hotline</p>
                <p class="text-sm py-2 font-[300]">Email</p>
                <p class="text-sm py-2 font-[300]">Live chat</p>
                <p class="text-sm py-2 font-[300]">Messenger</p>
                <p class="text-sm py-2 font-[300]">Liên hệ</p>
            </div>
        </div>
        <div>
            <div class="
            border-[6px] border-[#9999]-500
            p-4
            rounded-tl-[45px] rounded-br-[45px]
          ">
                <p class="font-[500] text-2xl pt-2 pr-4 pb-4">
                    Nhận thông tin các chương trình của IVY moda
                </p>
                <div class="flex pb-4">
                    <div class="w-15 border-b">
                        <p class="text-sm text-gray-500 pr-14">Nhập địa chỉ email</p>
                    </div>
                    <div class="
                border border-black
                rounded-tl-[15px] rounded-br-[15px]
                w-28
                h-10
                flex
                justify-center
                items-center
              ">
                        <a href="#"><button>Đăng ký</button></a>
                    </div>
                </div>
            </div>
            <div class="text-2xl font-semibold py-4">Download App</div>
            <img src="./public/image/appstore.png" class="w-42 h-auto pb-2" alt="" />
            <img src="./public/image/googleplay.png" class="w-42 h-auto pt-2" alt="" />
        </div>
    </div>
    <hr>
    <div class="flex justify-center items-center h-16">
        <p>©IVYmoda All rights reserved - Nhóm 1</p>
    </div>

</footer>

</html>