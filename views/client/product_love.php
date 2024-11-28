<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php require_once "partials/menu.php" ?>
    <article class="mt-[90px]">
        <div class="flex gap-4 my-4">
            <div class="text-sm"><a href="?action=home">Trang chủ</a></div>
            <div class="text-sm">-</div>
            <div class="text-sm"> Tài khoản của tôi</div>
        </div>
        <hr class="mb-8">
        <div class="grid grid-cols-[1.2fr_5fr] gap-36">
            <div class="border rounded-tl-[40px] rounded-br-[40px] p-8 w-full h-[310px]">
                <div class="font-semibold text-gray-500 flex items-center gap-2">
                    <img src="./public/image/useravt.png" class="w-8 h-8" alt="">
                    <?= $user['first_name'] . ' ' . $user['name'] ?>
                </div>
                <hr class="my-6">
                <div class="pb-6 font-[550] text-gray-500 text-[14px] flex gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-3 h-3 text-gray-500">
                        <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                    <a href="?action=info">Thông tin tài khoản</a>
                </div>
                <div class="text-[14px] text-gray-500 font-[550] flex gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 h-3 text-gray-500">
                        <path d="M48 256C48 141.1 141.1 48 256 48c63.1 0 119.6 28.1 157.8 72.5c8.6 10.1 23.8 11.2 33.8 2.6s11.2-23.8 2.6-33.8C403.3 34.6 333.7 0 256 0C114.6 0 0 114.6 0 256l0 40c0 13.3 10.7 24 24 24s24-10.7 24-24l0-40zm458.5-52.9c-2.7-13-15.5-21.3-28.4-18.5s-21.3 15.5-18.5 28.4c2.9 13.9 4.5 28.3 4.5 43.1l0 40c0 13.3 10.7 24 24 24s24-10.7 24-24l0-40c0-18.1-1.9-35.8-5.5-52.9zM256 80c-19 0-37.4 3-54.5 8.6c-15.2 5-18.7 23.7-8.3 35.9c7.1 8.3 18.8 10.8 29.4 7.9c10.6-2.9 21.8-4.4 33.4-4.4c70.7 0 128 57.3 128 128l0 24.9c0 25.2-1.5 50.3-4.4 75.3c-1.7 14.6 9.4 27.8 24.2 27.8c11.8 0 21.9-8.6 23.3-20.3c3.3-27.4 5-55 5-82.7l0-24.9c0-97.2-78.8-176-176-176zM150.7 148.7c-9.1-10.6-25.3-11.4-33.9-.4C93.7 178 80 215.4 80 256l0 24.9c0 24.2-2.6 48.4-7.8 71.9C68.8 368.4 80.1 384 96.1 384c10.5 0 19.9-7 22.2-17.3c6.4-28.1 9.7-56.8 9.7-85.8l0-24.9c0-27.2 8.5-52.4 22.9-73.1c7.2-10.4 8-24.6-.2-34.2zM256 160c-53 0-96 43-96 96l0 24.9c0 35.9-4.6 71.5-13.8 106.1c-3.8 14.3 6.7 29 21.5 29c9.5 0 17.9-6.2 20.4-15.4c10.5-39 15.9-79.2 15.9-119.7l0-24.9c0-28.7 23.3-52 52-52s52 23.3 52 52l0 24.9c0 36.3-3.5 72.4-10.4 107.9c-2.7 13.9 7.7 27.2 21.8 27.2c10.2 0 19-7 21-17c7.7-38.8 11.6-78.3 11.6-118.1l0-24.9c0-53-43-96-96-96zm24 96c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 24.9c0 59.9-11 119.3-32.5 175.2l-5.9 15.3c-4.8 12.4 1.4 26.3 13.8 31s26.3-1.4 31-13.8l5.9-15.3C267.9 411.9 280 346.7 280 280.9l0-24.9z" />
                    </svg>
                    <a href="?action=hislogin">Lịch sử đăng nhập</a>
                </div>
                <div class="py-6 text-[14px] text-gray-500 font-[550] flex gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-3 h-3 text-gray-500">
                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <a href="?action=address-book">Sổ địa chỉ</a>
                </div>
                <div class="text-[14px]  font-[550] flex gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 h-3 text-gray-500">
                        <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                    </svg>
                    <a href="?action=product-love">Sản phẩm yêu thích</a>
                </div>
            </div>
            <div class="min-h-[350px]">
                <div class="font-semibold text-2xl mb-4">SẢN PHẨM YÊU THÍCH</div>
                <?php if (empty($wishlist)): ?>
                    <p class="text-gray-500">Bạn chưa có sản phẩm yêu thích nào.</p>
                <?php else: ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <?php foreach ($wishlist as $product): ?>
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
                                    <?php
                                    $email = $_SESSION['email'];
                                    $productId = $product['id'];
                                    $isInWishlist = $this->checkWishlistStatus($email, $productId);
                                    ?>
                                    <a href="javascript:void(0);" class="remove-wishlist <?php if (!$isInWishlist) echo 'hidden'; ?>" data-id="<?= $product['id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                                            <path fill="#ff0000" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="add-wishlist <?php if ($isInWishlist) echo 'hidden'; ?>" data-id="<?= $product['id'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 text-gray-600">
                                            <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                        </svg>
                                    </a>
                                </div>
                                <a href="?action=product&id=<?= urlencode($product['id']) ?>" class="text-sm block hover:text-red-500">
                                    <?= htmlspecialchars($product['name']) ?>
                                </a>
                                <div class="font-semibold pt-4"><?= number_format($product['price'], 0, ',', '.') ?>đ</div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>


        </div>
        </div>
    </article>
    <hr>
    <script src="views/client/js/ajaxproduct_love.js"></script>
</body>
<?php require_once "partials/footer.php" ?>

</html>