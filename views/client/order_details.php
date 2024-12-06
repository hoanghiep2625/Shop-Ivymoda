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
                <div class="font-semibold text-2xl mb-4">Chi tiết đơn hàng</div>
                <div class="border rounded-lg p-6 bg-white mb-6">
                    <div class="text-lg font-semibold text-gray-900">Mã đơn hàng: <?= $order['order_id'] ?></div>
                    <div class="text-gray-600 text-sm">Ngày tạo: <?= date('d/m/Y', strtotime($order['order_date'])) ?></div>
                    <div class="text-gray-600 text-sm flex items-center gap-1">Trạng thái:<?php
                                                                                            if ($order['status'] == 'pending') {
                                                                                                echo '<div class="font-semibold text-yellow-500">Đang xử lý</div>';
                                                                                            }
                                                                                            if ($order['status'] == 'processing') {
                                                                                                echo '<div class="font-semibold text-blue-500">Đã được xử lý</div>';
                                                                                            }
                                                                                            if ($order['status'] == 'completed') {
                                                                                                echo '<div class="font-semibold text-green-500">Hoàn tất</div>';
                                                                                            }
                                                                                            if ($order['status'] == 'cancelled') {
                                                                                                echo '<div class="font-semibold text-red-500">Đã huỷ</div>';
                                                                                            }

                                                                                            ?></div>
                    <hr class="my-6 border-gray-300">

                    <div class="text-xl font-semibold text-gray-900 mb-4">Chi tiết sản phẩm:</div>
                    <table class="w-full table-auto mt-4 text-sm">
                        <thead>
                            <tr class="text-left bg-gray-100 text-gray-700">
                                <th class="px-4 py-2 w-12">#</th>
                                <th class="border-b px-4 py-2">Ảnh</th>
                                <th class="border-b px-4 py-2">Sản phẩm</th>
                                <th class="border-b px-4 py-2">Số lượng</th>
                                <th class="border-b px-4 py-2">Size</th>
                                <th class="border-b px-4 py-2">Đơn giá</th>
                                <th class="border-b px-4 py-2">Tổng giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderDetails as $index => $product): ?>
                                <tr class="hover:bg-gray-50 transition-all duration-300">
                                    <td class="border-b px-4 py-2"><?= $index + 1 ?></td>
                                    <td class="border-b px-4 py-2">
                                        <img src="<?= $this->WebModel->getMainProductImage($product['product_id']) ?>" alt="<?= $product['product_name'] ?>" class="w-12 h-12 object-cover rounded-md mx-auto">
                                    </td>
                                    <td class="border-b px-4 py-2"><?= $product['product_name'] ?></td>
                                    <td class="border-b px-4 py-2"><?= $product['quantity'] ?></td>
                                    <td class="border-b px-4 py-2"><?= $product['size'] ?></td>
                                    <td class="border-b px-4 py-2"><?= number_format($product['price'], 0, ',', '.') ?> đ</td>
                                    <td class="border-b px-4 py-2"><?= number_format($product['price'] * $product['quantity'], 0, ',', '.') ?> đ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <hr class="my-6 border-gray-300">

                    <div class="font-semibold text-xl text-gray-900">Tổng cộng: <?= number_format($order['total_price'], 0, ',', '.') ?> VND</div>
                </div>
            </div>
        </div>
        </div>
    </article>
    <hr>
</body>
<?php require_once "partials/footer.php" ?>

</html>