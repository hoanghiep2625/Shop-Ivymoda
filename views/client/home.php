<?php require_once "partials/header.php" ?>

<body class="mx-[8%] ">
    <?php require_once "partials/menu.php" ?>
    <article>
        <div class="grid grid-cols-[1fr_1.3fr_1fr] items-center justify-center">
            <div class="bg-[#D73831] text-white p-2 font-semibold text-center">SALE OFF 50%</div>
            <div class="bg-[#DC633A] text-white p-2 font-semibold text-center">SALE OFF 30%</div>
            <div class="bg-[#AC2F33] text-white p-2 font-semibold text-center">LAST SALE FROM 100K</div>
        </div>
        <div class="swiper-container-banner1 w-full max-w-[100%] mx-auto overflow-hidden relative">
            <div class="swiper-wrapper">
                <!-- Các ảnh trong banner 1 -->
                <div class="swiper-slide">
                    <img src="./public/image/banner1.webp" class="rounded-tl-[80px] rounded-br-[80px] my-7 w-full h-auto" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./public/image/banner1.2.webp" class="rounded-tl-[80px] rounded-br-[80px] my-7 w-full h-auto" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./public/image/banner1.3.webp" class="rounded-tl-[80px] rounded-br-[80px] my-7 w-full h-auto" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./public/image/banner1.4.webp" class="rounded-tl-[80px] rounded-br-[80px] my-7 w-full h-auto" alt="">
                </div>
            </div>
            <div class="swiper-button-next text-white hover:text-gray-700 absolute"></div>
            <div class="swiper-button-prev text-white hover:text-gray-700 absolute"></div>
        </div>
        <p class="text-center font-semibold text-3xl p-2">NEW ARRIVAL</p>
        <div class="flex justify-center pb-8">
            <p class="pr-6 text-xl underline">IVY moda</p>
            <p class="pl-6 text-xl text-gray-500">IVY men</p>
        </div>
        <?php
        unset($products);
        $products = $productsnew;
        include 'partials/product_list.php';
        ?>
        <div class="p-3 border border-black text-center w-32 h-12 mx-auto rounded-tl-[25px] rounded-br-[25px] mb-12 hover:bg-black hover:text-white transition-all duration-300 cursor-pointer">Xem tất cả</div>
        <p class="text-center font-semibold text-3xl pb-2">FALL - WINTER COLLECTION 2024</p>
        <div class="flex justify-center pb-8">
            <p class="pr-6 text-xl underline">IVY moda</p>
            <p class="pl-6 text-xl text-gray-500">IVY men</p>
        </div>
        <?php
        unset($products);
        $products = $productsfall;
        include 'partials/product_list.php';
        ?>
        <div class="p-3 border border-black text-center w-32 h-12 mx-auto rounded-tl-[25px] rounded-br-[25px] mb-12 hover:bg-black hover:text-white transition-all duration-300 cursor-pointer">Xem tất cả</div>
        <banner>
            <img src="./public/image/banner1.webp" class="rounded-tl-[80px] rounded-br-[80px] my-7" alt="">
        </banner>
        <div class="swiper-container-banner2 w-full max-w-[100%] mx-auto overflow-hidden relative mb-8">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-between">
                    <img src="./public/image/banner2.1.webp" class="w-[48.5%] rounded-tl-[70px] rounded-br-[70px] h-auto" alt="">
                    <img src="./public/image/banner2.2.webp" class="w-[48.5%] rounded-tl-[70px] rounded-br-[70px] h-auto" alt="">
                </div>
                <div class="swiper-slide flex justify-between">
                    <img src="./public/image/banner2.2.webp" class="w-[48.5%] h-auto rounded-tl-[70px] rounded-br-[70px]" alt="">
                    <img src="./public/image/banner2.3.webp" class="w-[48.5%] h-auto rounded-tl-[70px] rounded-br-[70px]" alt="">
                </div>
                <div class="swiper-slide flex justify-between">
                    <img src="./public/image/banner2.3.webp" class="w-[48.5%] h-auto rounded-tl-[70px] rounded-br-[70px]" alt="">
                    <img src="./public/image/banner2.1.webp" class="w-[48.5%] h-auto rounded-tl-[70px] rounded-br-[70px]" alt="">
                </div>
            </div>
            <div class="swiper-button-next text-white hover:text-gray-700 absolute"></div>
            <div class="swiper-button-prev text-white hover:text-gray-700 absolute"></div>
        </div>
    </article>
    <hr>
    <script>
        document.querySelectorAll('.add-wishlist, .remove-wishlist').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const isRemove = this.classList.contains('remove-wishlist');
                const actionUrl = isRemove ? '?action=removeFromWishlist&id=' : '?action=addToWishlist&id=';
                fetch(actionUrl + productId, {
                        method: 'GET',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const addBtn = document.querySelector('.add-wishlist[data-id="' + productId + '"]');
                            const removeBtn = document.querySelector('.remove-wishlist[data-id="' + productId + '"]');

                            if (addBtn && removeBtn) {
                                if (data.action === 'added') {
                                    addBtn.classList.add('hidden');
                                    removeBtn.classList.remove('hidden');
                                } else if (data.action === 'removed') {
                                    removeBtn.classList.add('hidden');
                                    addBtn.classList.remove('hidden');
                                }
                            } else {
                                console.error('Không tìm thấy nút với productId:', productId);
                            }
                        } else {
                            console.error(data.message || 'Có lỗi xảy ra');
                        }
                    })
                    .catch(error => {
                        console.error('Có lỗi xảy ra:', error);
                    });
            });
        });
    </script>
</body>
<?php require_once "partials/footer.php" ?>
<script src="views/client/js/slideshow.js"></script>

</html>