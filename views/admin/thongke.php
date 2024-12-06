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
            <main class="p-4 flex-grow bg-gray-100 pt-16">
                <div class="bg-white p-6 shadow rounded">
                    <!-- Tiêu đề chính -->
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">
                        Chào mừng đến với trang quản trị admin <span class="text-indigo-600">IVY moda</span>
                    </h1>

                    <!-- Thông tin tổng quan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tổng số lượng sản phẩm -->
                        <div class="p-4 bg-gray-50 border-l-4 border-indigo-500 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Tổng số lượng sản phẩm có trong kho</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= $soluongsanpham ?></p>
                        </div>

                        <!-- Tổng số lượng thành viên -->
                        <div class="p-4 bg-gray-50 border-l-4 border-green-500 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Tổng thành viên</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= $total_users ?></p>
                        </div>

                        <!-- Tổng số đơn hàng -->
                        <div class="p-4 bg-gray-50 border-l-4 border-yellow-500 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Tổng đơn hàng</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= $total_orders ?></p>
                        </div>
                        <div class="p-4 bg-gray-50 border-l-4 border-yellow-500 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Tổng đơn hàng xử lý</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= $total_orders_xuly ?></p>
                        </div>
                        <div class="p-4 bg-gray-50 border-l-4 border-yellow-500 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Tổng đơn hàng hoàn thành</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= $total_orders_hoanthanh ?></p>
                        </div>
                        <div class="p-4 bg-gray-50 border-l-4 border-yellow-500 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Tổng đơn hàng bị huỷ</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= $total_orders_dahuy ?></p>
                        </div>

                        <!-- Doanh thu ước tính -->
                        <div class="p-4 bg-gray-50 border-l-4 border-red-500 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Tổng doanh thu ước tính</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= number_format($doanhthu, 0, ',', '.') ?>đ</p>
                        </div>
                        <div class="p-4 bg-gray-50 border-l-4 border-green-600 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Doanh thu hôm nay</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= number_format($today_revenue, 0, ',', '.') ?>đ</p>
                        </div>

                        <div class="p-4 bg-gray-50 border-l-4 border-green-600 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Doanh thu tháng này</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= number_format($monthly_revenue, 0, ',', '.') ?>đ</p>
                        </div>
                        <div class="p-4 bg-gray-50 border-l-4 border-green-600 rounded shadow-sm">
                            <h2 class="text-sm font-medium text-gray-600">Doanh thu năm nay</h2>
                            <p class="text-2xl font-semibold text-gray-800"><?= number_format($year_revenue, 0, ',', '.') ?>đ</p>
                        </div>

                    </div>
                </div>
            </main>

        </div>
    </div>

</body>
<?php include "partials/footer.php"; ?>

</html>