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
                <div class="font-semibold text-2xl mb-4">Quản lý đơn hàng</div>
                <?php if (!empty($orders)): ?>
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-left border-b p-2">Mã đơn hàng</th>
                                <th class="text-left border-b p-2">Ngày</th>
                                <th class="text-left border-b p-2">Trạng thái</th>
                                <th class="text-left border-b p-2">Tổng tiền</th>
                                <th class="text-left border-b p-2">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td class="border-b text-sm p-2"><?= htmlspecialchars($order['order_id']) ?></td>
                                    <td class="border-b text-sm p-2"><?= htmlspecialchars($order['order_date']) ?></td>
                                    <td class="border-b text-sm p-2"><?php
                                                                        if ($order['status'] == 'pending') {
                                                                            echo '<div class="text-yellow-500">Đang xử lý</div>';
                                                                        }
                                                                        if ($order['status'] == 'processing') {
                                                                            echo '<div class="text-blue-500">Đã được xử lý</div>';
                                                                        }
                                                                        if ($order['status'] == 'completed') {
                                                                            echo '<div class="text-green-500">Hoàn tất</div>';
                                                                        }
                                                                        if ($order['status'] == 'cancelled') {
                                                                            echo '<div class="text-red-500">Đã huỷ</div>';
                                                                        }

                                                                        ?></td>
                                    <td class="border-b p-2 text-sm"><?= number_format($order['total_price'], 0, ',', '.') ?> VNĐ</td>
                                    <td class="border-b p-2 text-sm">
                                        <a href="?action=order_details&id=<?= htmlspecialchars($order['order_id']) ?>"
                                            class="text-red-600 hover:text-red-800 hover:underline font-semibold transition duration-300 ease-in-out">
                                            Chi tiết đơn hàng
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-gray-500">Chưa có đơn hàng nào.</p>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </article>
    <hr>
    <script src="views/client/js/changecolormenupro5.js"></script>
</body>
<?php require_once "partials/footer.php" ?>

</html>