<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "partials/menu.php" ?>
    <article class="mt-[90px]">
        <div class="flex gap-4 my-4">
            <div class="text-sm"><a href="?action=home">Trang chủ</a></div>
            <div class="text-sm">-</div>
            <div class="text-sm"> <?= $sub_subcategories['name'] ?></div>
            <div class="text-sm">-</div>
            <div class="text-sm"> <?= $productview['name'] ?></div>
        </div>
        <hr class="mb-8">
        <div class="grid grid-cols-2">
            <div class="w-[100%] flex gap-3">
                <!-- Ảnh chính -->
                <div id="zoomLayout" class="relative w-[80%] h-[844.5px] overflow-hidden">
                    <img id="mainImage" src="<?= $imgmain ?>" class="w-full h-full object-cover transition-transform duration-300 ease-in-out" alt="">
                </div>

                <!-- Slideshow -->
                <div class="relative overflow-hidden h-[720px]  mt-[60px]">
                    <!-- Container slideshow -->
                    <div id="slideshow" class="flex flex-col gap-4 transition-transform duration-500">
                        <?php foreach ($imgproduct as $img): ?>
                            <img src="<?= $img['image_url'] ?>" class="w-[100%] h-[174px] object-cover cursor-pointer" alt="">
                        <?php endforeach; ?>
                    </div>
                    <!-- Nút điều hướng -->
                    <button id="prev" class="absolute top-0 left-0 bg-black text-white px-2 py-1 opacity-70 z-10">↑</button>
                    <button id="next" class="absolute bottom-0 left-0 bg-black text-white px-2 py-1 opacity-70 z-10">↓</button>
                </div>
            </div>

            <div class="px-[100px]">
                <div class="text-3xl font-[550]"><?= mb_strtoupper($productview['name'], 'UTF-8') ?></div>
                <div class="flex items-center">
                    <div class="text-gray-500 py-4">SKU: <?= $productview['sku_code'] ?>
                    </div>
                    <div class="ml-8 flex gap-[2px]"><img src="./public/image/star.png" class="w-4" alt="">
                        <img src="./public/image/star.png" class="w-4" alt="">
                        <img src="./public/image/star.png" class="w-4" alt="">
                        <img src="./public/image/star.png" class="w-4" alt="">
                        <img src="./public/image/star.png" class="w-4" alt="">
                    </div>
                    <div class="text-gray-500 ml-4">(0 đánh giá)</div>
                </div>
                <div class="text-2xl font-[550]"><?= number_format($productview['price'], 0, ',', '.') ?>đ</div>
                <div class="text-xl font-[550] my-4">Màu sắc: <?= $productview['name_color'] ?></div>
                <div class="flex gap-2 py-2">
                    <?php foreach ($productcolor as $color): ?>
                        <?php
                        $isLight = $this->isLightColor($color['hex_color']);
                        $isSelected = ($color['id'] === $productview['id']);
                        ?>
                        <a href="?action=product&id=<?= urlencode($color['id']) ?>" class="block">
                            <div
                                class="rounded-full w-5 h-5 relative flex items-center justify-center <?= $isLight ? 'border border-gray-300' : '' ?>"
                                style="background-color: <?= $color['hex_color'] ?>;">
                                <?php if ($isSelected): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current <?= $isLight ? 'text-gray-400' : 'text-white' ?>" viewBox="0 0 448 512">
                                        <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="flex gap-4 my-4">
                    <?php foreach ($size as $item): ?>
                        <div class="border border-gray-400 w-[46px] h-[30px] flex items-center justify-center text-gray-500 <?= $item['stock'] == 0 ? 'line-through cursor-not-allowed opacity-50 bg-gray-100' : 'cursor-pointer hover:border-black hover:text-black' ?>" <?= $item['stock'] == 0 ? 'disabled' : '' ?>>
                            <?= $item['size'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-xs flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 h-3 text-gray-500">
                        <path d="M177.9 494.1c-18.7 18.7-49.1 18.7-67.9 0L17.9 401.9c-18.7-18.7-18.7-49.1 0-67.9l50.7-50.7 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 50.7-50.7c18.7-18.7 49.1-18.7 67.9 0l92.1 92.1c18.7 18.7 18.7 49.1 0 67.9L177.9 494.1z" />
                    </svg>
                    Kiểm tra size của bạn
                </div>
                <div class="flex items-center gap-4">
                    <div class="font-[500] text-[#727171]">Số lượng</div>
                    <div class="flex items-center justify-center gap-0.5 relative w-36 h-12 my-4">
                        <button id="decreaseBtn" class="flex items-center justify-center border w-12 h-12 rounded rounded-tl-[15px] rounded-br-[15px] text-xl absolute left-0">
                            -
                        </button>
                        <div id="quantityDisplay" class="flex items-center justify-center text-center text-sm border-y w-20 h-full z-10 absolute">
                            1
                        </div>
                        <button id="increaseBtn" class="flex items-center justify-center border w-12 h-12 rounded rounded-tl-[15px] rounded-br-[15px] text-xl absolute right-0">
                            +
                        </button>
                    </div>
                </div>
                <div class="flex gap-4 mb-20">
                    <div class="bg-black my-4 text-lg font-semibold text-white w-[174px] h-[48px] rounded-tl-[15px] rounded-br-[15px] flex justify-center items-center hover:bg-white hover:text-black hover:border hover:border-black cursor-pointer transition-all duration-300">
                        Thêm vào giỏ
                    </div>
                    <div class="bg-white my-4 text-lg font-semibold text-black border border-black w-[124px] h-[46px] rounded-tl-[15px] rounded-br-[15px] flex justify-center items-center hover:bg-black hover:text-white transition-all duration-300 cursor-pointer">
                        Mua hàng
                    </div>
                    <div class="bg-white my-4 text-lg font-semibold text-black border border-black w-[46px] h-[46px] rounded-tl-[15px] rounded-br-[15px] flex justify-center items-center hover:bg-black hover:text-white transition-all duration-300 group cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 transition-all duration-300 group-hover:fill-white group-hover:scale-110">
                            <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                        </svg>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="flex gap-6">
                        <div id="tab-gioi-thieu" class="tab-button text-xs font-semibold mt-10 mb-5 text-gray-500 cursor-pointer hover:text-black px-2 py-1">
                            GIỚI THIỆU
                        </div>
                        <div id="tab-chi-tiet" class="tab-button text-xs font-semibold mt-10 mb-5 text-gray-500 cursor-pointer hover:text-black px-2 py-1">
                            CHI TIẾT SẢN PHẨM
                        </div>
                        <div id="tab-bao-quan" class="tab-button text-xs font-semibold mt-10 mb-5 text-gray-500 cursor-pointer hover:text-black px-2 py-1">
                            BẢO QUẢN
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div id="gioi_thieu" class="tab-content text-[14px] leading-6 hidden">
                        <?= $productview['short_description'] ?>
                    </div>
                    <div id="chi_tiet_san_pham" class="tab-content text-[14px] leading-6 hidden flex gap-20">
                        <div class="text-[14px]">
                            <?= $productview['full_description'] ?>
                        </div>
                    </div>
                    <div id="bao_quan" class="tab-content text-[14px] leading-6 hidden">
                        <p class="mb-4">Chi tiết bảo quản sản phẩm:</p>
                        <p class="font-semibold">* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.</p>
                    </div>
                </div>
                <div class="relative">
                    <hr>
                    <div class="flex justify-center items-center flex-row">
                        <div class="rounded-full w-6 h-6 border absolute bg-white"></div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center font-semibold text-3xl py-10">Sản phẩm đã xem</p>
        <div class="grid grid-cols-5 gap-8 mb-8">
            <?php foreach ($viewedProducts as $product): ?>
                <div class="relative">
                    <!-- Thêm liên kết cho ảnh -->
                    <a href="?action=product&id=<?= urlencode($product['id']) ?>">
                        <img src="<?= $this->WebModel->getMainProductImage($product['id']) ?>" class="pb-2" alt="">
                    </a>
                    <div class="flex gap-2 py-2 justify-between items-center">
                        <div class="flex gap-2 py-2">
                            <?php $productcolor = $this->WebModel->getAllColorBySku($product['sku_code'], $product['id']);
                            foreach ($productcolor as $color):
                                $isLight = $this->isLightColor($color['hex_color']);
                                $isSelected = ($color['id'] === $product['id']);
                            ?>
                                <a href=" ?action=product&id=<?= urlencode($color['id']) ?>" class="block">
                                    <div
                                        class="rounded-full w-5 h-5 relative flex items-center justify-center <?= $isLight ? 'border border-gray-300' : '' ?>"
                                        style="background-color: <?= $color['hex_color'] ?>;">
                                        <?php if ($isSelected): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current <?= $isLight ? 'text-gray-400' : 'text-white' ?>" viewBox="0 0 448 512">
                                                <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <?php
                        $email = $_SESSION['email'];
                        $productId = $product['id']; // Lấy ID sản phẩm từ mảng sản phẩm
                        $isInWishlist = $this->checkWishlistStatus($email, $productId);
                        ?>
                        <!-- Hiển thị nút xóa nếu sản phẩm có trong wishlist -->
                        <a href="javascript:void(0);" class="remove-wishlist <?php if (!$isInWishlist) {
                                                                                    echo 'hidden';
                                                                                } ?>" data-id="<?= $product['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                                <path fill="#ff0000" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                            </svg>
                        </a>
                        <!-- Hiển thị nút thêm nếu sản phẩm không có trong wishlist -->
                        <a href="javascript:void(0);" class="add-wishlist <?php if ($isInWishlist) {
                                                                                echo 'hidden';
                                                                            } ?>" data-id="<?= $product['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 text-gray-600">
                                <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                            </svg>
                        </a>

                    </div>
                    <!-- Thêm liên kết cho tên -->
                    <a href="?action=product&id=<?= urlencode($product['id']) ?>" class="text-sm block hover:text-red-500">
                        <?= htmlspecialchars($product['name']) ?>
                    </a>
                    <div class="font-semibold pt-4"><?= number_format($product['price'], 0, ',', '.') ?>đ</div>
                    <div>
                        <div class="w-8 h-8 bg-black hover:bg-white border border-transparent hover:border-black rounded-tl-[10px] rounded-br-[10px] absolute right-0 bottom-0 flex items-center justify-center transition-all duration-300 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4 fill-current text-white group-hover:text-black transition-all duration-300">
                                <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                            </svg>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <p class="text-center font-semibold text-3xl py-10">Sản phẩm tương tự</p>
        <div class="grid grid-cols-5 gap-8 mb-8">
            <?php foreach ($sanphamtuongtu as $product): ?>
                <div class="relative">
                    <!-- Thêm liên kết cho ảnh -->
                    <a href="?action=product&id=<?= urlencode($product['id']) ?>">
                        <img src="<?= $this->WebModel->getMainProductImage($product['id']) ?>" class="pb-2" alt="">
                    </a>
                    <div class="flex gap-2 py-2 justify-between items-center">
                        <div class="flex gap-2 py-2">
                            <?php $productcolor = $this->WebModel->getAllColorBySku($product['sku_code'], $product['id']);
                            foreach ($productcolor as $color):
                                $isLight = $this->isLightColor($color['hex_color']);
                                $isSelected = ($color['id'] === $product['id']);
                            ?>
                                <a href=" ?action=product&id=<?= urlencode($color['id']) ?>" class="block">
                                    <div
                                        class="rounded-full w-5 h-5 relative flex items-center justify-center <?= $isLight ? 'border border-gray-300' : '' ?>"
                                        style="background-color: <?= $color['hex_color'] ?>;">
                                        <?php if ($isSelected): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current <?= $isLight ? 'text-gray-400' : 'text-white' ?>" viewBox="0 0 448 512">
                                                <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <?php
                        $email = $_SESSION['email'];
                        $productId = $product['id']; // Lấy ID sản phẩm từ mảng sản phẩm
                        $isInWishlist = $this->checkWishlistStatus($email, $productId);
                        ?>
                        <!-- Hiển thị nút xóa nếu sản phẩm có trong wishlist -->
                        <a href="javascript:void(0);" class="remove-wishlist <?php if (!$isInWishlist) {
                                                                                    echo 'hidden';
                                                                                } ?>" data-id="<?= $product['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                                <path fill="#ff0000" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                            </svg>
                        </a>
                        <!-- Hiển thị nút thêm nếu sản phẩm không có trong wishlist -->
                        <a href="javascript:void(0);" class="add-wishlist <?php if ($isInWishlist) {
                                                                                echo 'hidden';
                                                                            } ?>" data-id="<?= $product['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 text-gray-600">
                                <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                            </svg>
                        </a>

                    </div>
                    <!-- Thêm liên kết cho tên -->
                    <a href="?action=product&id=<?= urlencode($product['id']) ?>" class="text-sm block hover:text-red-500">
                        <?= htmlspecialchars($product['name']) ?>
                    </a>
                    <div class="font-semibold pt-4"><?= number_format($product['price'], 0, ',', '.') ?>đ</div>
                    <div>
                        <div class="w-8 h-8 bg-black hover:bg-white border border-transparent hover:border-black rounded-tl-[10px] rounded-br-[10px] absolute right-0 bottom-0 flex items-center justify-center transition-all duration-300 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4 fill-current text-white group-hover:text-black transition-all duration-300">
                                <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                            </svg>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <banner>
            <img src="./public/image/banner1.webp" class="rounded-tl-[80px] rounded-br-[80px] my-7" alt="">
        </banner>
    </article>
    <hr>
    <script src="views/client/js/tabshow.js"></script>
    <script src="views/client/js/product.js"></script>
    <script src="views/client/js/ajaxproduct_love.js"></script>
</body>
<?php require_once "partials/footer.php" ?>

</html>