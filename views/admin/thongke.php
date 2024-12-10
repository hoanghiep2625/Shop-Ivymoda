<?php include "partials/header.php"; ?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>

        <div class="flex-1 flex flex-col ml-64">
            <!-- Top Navbar -->
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center fixed w-full">
                <div class="text-lg font-bold">Thống kê</div>
            </header>

            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100 pt-20">
                <div class="bg-white p-6 shadow rounded">
                    <!-- Tiêu đề chính -->
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">
                        Chào mừng đến với trang quản trị admin <span class="text-indigo-600">IVY moda</span>
                    </h1>

                    <div class="text-2xl font-bold text-gray-800 mb-6">Lọc doanh thu</div>
                    <form action="?action=thongke" method="POST" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="from_date" class="block text-sm font-medium text-gray-700 mb-1">
                                    Từ ngày
                                </label>
                                <input type="date"
                                    name="from_date"
                                    id="from_date"
                                    value="<?= isset($_POST['from_date']) ? $_POST['from_date'] : '' ?>"
                                    class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="to_date" class="block text-sm font-medium text-gray-700 mb-1">
                                    Đến ngày
                                </label>
                                <input type="date"
                                    name="to_date"
                                    id="to_date"
                                    value="<?= isset($_POST['to_date']) ? $_POST['to_date'] : '' ?>"
                                    class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="flex items-end">
                                <button type="submit"
                                    class="w-full bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-600 transition-all">
                                    Lọc
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class='p-4 bg-gray-50 border-l-4 border-green-500 rounded shadow-sm'>
                        <h2 class='text-sm font-medium text-gray-600'>Thống kê doanh thu theo ngày</h2>
                        <p class='text-2xl font-semibold text-gray-800'><?= number_format($locdoanhthu, 0, ',', '.') ?>đ</p>
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-6">Thống kê</div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Thẻ thống kê -->
                        <?php
                        $cards = [
                            ['title' => 'Tổng sản phẩm', 'value' => $soluongsanpham, 'color' => 'indigo'],
                            ['title' => 'Tổng thành viên', 'value' => $total_users, 'color' => 'green'],
                            ['title' => 'Tổng đơn hàng', 'value' => $total_orders, 'color' => 'yellow'],
                            ['title' => 'Đơn hàng xử lý', 'value' => $total_orders_xuly, 'color' => 'yellow'],
                            ['title' => 'Đơn hàng hoàn thành', 'value' => $total_orders_hoanthanh, 'color' => 'yellow'],
                            ['title' => 'Đơn hàng bị hủy', 'value' => $total_orders_dahuy, 'color' => 'red'],
                            ['title' => 'Tổng doanh thu (ước tính ' . number_format($doanhthu, 0, ',', '.') . 'đ)', 'value' => number_format($doanhthutt, 0, ',', '.') . 'đ', 'color' => 'red'],
                            ['title' => 'Doanh thu hôm nay (ước tính ' . number_format($today_revenue, 0, ',', '.') . 'đ)', 'value' => number_format($today_revenuett, 0, ',', '.') . 'đ', 'color' => 'green'],
                            ['title' => 'Doanh thu tháng này (ước tính ' . number_format($monthly_revenue, 0, ',', '.') . 'đ)', 'value' => number_format($monthly_revenuett, 0, ',', '.') . 'đ', 'color' => 'green'],
                            ['title' => 'Doanh thu năm nay(ước tính ' . number_format($year_revenue, 0, ',', '.') . 'đ)', 'value' => number_format($year_revenuett, 0, ',', '.') . 'đ', 'color' => 'green'],
                        ];

                        foreach ($cards as $card) {
                            echo "
                                <div class='p-4 bg-gray-50 border-l-4 border-{$card['color']}-500 rounded shadow-sm'>
                                    <h2 class='text-sm font-medium text-gray-600'>{$card['title']}</h2>
                                    <p class='text-2xl font-semibold text-gray-800'>{$card['value']}</p>
                                </div>";
                        }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
<?php include "partials/footer.php"; ?>

</html>