<?php include "partials/header.php"; ?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col ml-64">
            <!-- Top Navbar -->
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center fixed w-full">
                <div class="text-lg font-bold">Quản lý đơn hàng</div>
            </header>
            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100 pt-16">
                <div class="bg-white p-6 shadow rounded">
                    <table id="export-table" class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Mã đơn hàng</th>
                                <th class="px-4 py-2 border">Email người dùng</th>
                                <th class="px-4 py-2 border">Tổng tiền</th>
                                <th class="px-4 py-2 border">Ngày đặt</th>
                                <th class="px-4 py-2 border">Trạng thái</th>
                                <th class="px-4 py-2 border">Địa chỉ giao hàng</th>
                                <th class="px-4 py-2 border">Tổng sản phẩm</th>
                                <th class="px-4 py-2 border">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): $user = $this->AdminModel->getUserById($order['user_id']) ?>
                                <tr class="hover:bg-gray-50 cursor-pointer">
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($order['order_id']) ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($user['email']) ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars(number_format($order['total_price'], 0, ',', '.')) ?>đ</td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars(date('d/m/Y', strtotime($order['order_date']))) ?></td>
                                    <td class="px-4 py-2 border">
                                        <div class="pr-2 
    <?php
                                if ($order['status'] == 'pending') {
                                    echo 'text-yellow-500';
                                } elseif ($order['status'] == 'processing') {
                                    echo 'text-blue-500';
                                } elseif ($order['status'] == 'completed') {
                                    echo 'text-green-500';
                                } elseif ($order['status'] == 'cancelled') {
                                    echo 'text-red-500';
                                } else {
                                    echo 'text-gray-500';
                                }
    ?>
">
                                            <?= $order['status'] ?? 'Không hợp lệ' ?>
                                            <?php
                                            if ($order['status'] == 'pending') {
                                                echo '(Đang xử lý)';
                                            } elseif ($order['status'] == 'processing') {
                                                echo '(Xử lý)';
                                            } elseif ($order['status'] == 'completed') {
                                                echo '(Hoàn tất)';
                                            } elseif ($order['status'] == 'cancelled') {
                                                echo '(Huỷ)';
                                            } else {
                                                echo '(Trạng thái không hợp lệ)';
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($order['shipping_address']) ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($order['total_product']) ?></td>
                                    <td class="px-4 py-2 border">
                                        <a href="?action=view_order&id=<?= urlencode($order['order_id']) ?>"
                                            class="bg-blue-500 text-white px-1 py-2 rounded hover:bg-blue-600">Chi tiết
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php include "partials/footer.php"; ?>
</body>