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
            <div class="min-h-[350px]">
                <div class="font-semibold text-2xl mb-4">SẢN PHẨM YÊU THÍCH</div>
                <?php if (empty($wishlist)): ?>
                    <p class="text-gray-500">Bạn chưa có sản phẩm yêu thích nào.</p>
                <?php else: ?>
                    <?php
                    unset($products);
                    $products = $wishlist;
                    $grid = 4;
                    include 'partials/product_list.php';
                    ?>
                <?php endif; ?>
            </div>


        </div>
        </div>
    </article>
    <hr>
    <script src="views/client/js/ajaxproduct_love.js"></script>
    <script src="views/client/js/changecolormenupro5.js"></script>
</body>
<?php require_once "partials/footer.php" ?>

</html>