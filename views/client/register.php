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
            <a href="#"><img src="./image/logo.png" alt="Logo" class="w-32 h-auto" /></a>
        </div>
        <div class="flex items-center">
            <div class="w-80 h-9 border">
                <div class="flex py-2 px-2">
                    <img src="./icon/search.svg" alt="" class="w-4 h-auto" />
                    <input type="text" placeholder="TÌM KIẾM SẢN PHẨM" class="text-sm outline-none pl-2" />
                </div>
            </div>
            <a href="#" class="ml-4"><img src="./icon/headphone.svg" alt="Headphone" class="w-5 h-auto" /></a>
            <a href="#" class="ml-4"><img src="./icon/user.svg" alt="User" class="w-5 h-auto" /></a>
            <a href="#" class="ml-4 mr-8"><img src="./icon/cart.svg" alt="Cart" class="w-5 h-auto" /></a>
        </div>
    </header>
    <hr />
    <article class="h-auto">
        <div class="flex justify-center">
            <p class="font-semibold text-2xl pt-4">ĐĂNG KÝ</p>
        </div>
        <div class="grid grid-cols-2 ">
            <!-- Cột trái -->
            <div class="flex flex-col">
                <p class="font-[500] text-[1rem] py-4">Thông tin khách hàng</p>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <p>Họ: <span class="text-red-500">*</span></p>
                        <div class="border w-[98%] h-11 flex items-center p-4 mb-6">
                            <input type="text" placeholder="Họ.." class="text-[14px] outline-none w-full">
                        </div>
                    </div>
                    <div>
                        <p>Tên: <span class="text-red-500">*</span></p>
                        <div class="w-[98%] border h-11 flex items-center p-4 mb-6">
                            <input type="text" placeholder="Tên.." class="text-[14px] outline-none w-full">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <p>Email: <span class="text-red-500">*</span></p>
                        <div class="border w-[98%] h-11 flex items-center p-4 mb-6">
                            <input type="text" placeholder="Email.." class="text-[14px] outline-none w-full">
                        </div>
                    </div>
                    <div>
                        <p>Điện thoại: <span class="text-red-500">*</span></p>
                        <div class="w-[98%] border h-11 flex items-center p-4 mb-6">
                            <input type="text" placeholder="Điện thoại.." class="text-[14px] outline-none w-full">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <p>Ngày sinh: <span class="text-red-500">*</span></p>
                        <div class="border w-[98%] h-11 flex items-center p-4 mb-6">
                            <input type="date" class="text-[14px] outline-none w-full">
                        </div>
                    </div>
                    <div>
                        <p>Giới tính: <span class="text-red-500">*</span></p>
                        <div class="w-[98%] border h-11 flex items-center p-4 mb-6">
                            <select class="text-[14px] outline-none w-full">
                                <option value="nam">Nam</option>
                                <option value="nu">Nữ</option>
                                <option value="khac">Khác</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <p>Tỉnh/Tp: <span class="text-red-500">*</span></p>
                        <div class="border w-[98%] h-11 flex items-center p-4 mb-6">
                            <select class="text-[14px] outline-none w-full" id="city" aria-label=".form-select-sm">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <p>Quận/Huyện: <span class="text-red-500">*</span></p>
                        <div class="w-[98%] border h-11 flex items-center p-4 mb-6">
                            <select class="text-[14px] outline-none w-full" id="district" aria-label=".form-select-sm">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>
                </div>
                <p>Phường/Xã: <span class="text-red-500">*</span></p>
                <div class="border w-[99%] h-11 flex items-center p-4 mb-4">
                    <select class="text-[14px] outline-none w-full" id="ward" aria-label=".form-select-sm">
                        <option value="" selected>Chọn phường xã</option>
                    </select>
                </div>
                <div>
                    <p>Địa chỉ: <span class="text-red-500">*</span></p>
                    <div class="border w-[99%] h-[80px] flex items-center p-4 mb-6">
                        <input type="text" class="text-[14px] outline-none w-full">
                    </div>
                </div>
            </div>

            <!-- Cột phải -->
            <div class="flex flex-col px-10">
                <p class="font-[500] text-[1rem] py-4">Thông tin mật khẩu</p>
                <div>
                    <p>Mật khẩu: <span class="text-red-500">*</span></p>
                    <div class="w-[100%] border h-11 flex items-center p-4 mb-6">
                        <input type="text" placeholder="Mật khẩu.." class="text-[14px] outline-none w-full">
                    </div>
                </div>
                <div>
                    <p>Nhập lại mật khẩu: <span class="text-red-500">*</span></p>
                    <div class="w-[100%] border h-11 flex items-center p-4 mb-6">
                        <input type="text" placeholder="Nhập lại mật khẩu.." class="text-[14px] outline-none w-full">
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    <p class="text-[14px]">Đồng ý với các <a href="#" class="text-red-500">điều khoản</a> của IVY</p>
                </div>
                <br>
                <div class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    <p class="text-[14px]">Đăng ký nhận bản tin</p>
                </div>
                <div class="bg-black w-[100%] p-3 flex justify-center items-center rounded-br-2xl rounded-tl-2xl my-8">
                    <a href="#">
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
                <img src="./image/logo.png" alt="" class="w-28 h-auto mr-4" />
                <img src="./image/dmca.png" alt="" class="w-15 h-5 mr-4" />
                <img src="./image/congthuong.png" alt="" class="w-15 h-8" />
            </div>
            <div class="grid grid-cols-5 py-5 flex items-center">
                <img src="./image/ic_fb.svg" class="w-3 h-auto" alt="" />
                <img src="./image/ic_gg.svg" class="w-5 h-auto" alt="" />
                <img src="./image/ic_instagram.svg" class="w-5 h-auto" alt="" />
                <img src="./image/ic_pinterest.svg" class="w-5 h-auto" alt="" />
                <img src="./image/ic_ytb.svg" class="w-5 h-auto" alt="" />
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
            <img src="./image/appstore.png" class="w-42 h-auto pb-2" alt="" />
            <img src="./image/googleplay.png" class="w-42 h-auto pt-2" alt="" />
        </div>
    </div>
    <hr>
    <div class="flex justify-center items-center h-16">
        <p>©IVYmoda All rights reserved - Nhóm 1</p>
    </div>

</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function (result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>

</html>