<?php include "partials/header.php"; ?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col ml-64">
            <!-- Top Navbar -->
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center fixed w-full">
                <a href="?action=add_product" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Thêm sản phẩm
                </a>
            </header>

            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100 pt-16">
                <div class="bg-white p-6 shadow rounded">
                    <table id="export-table" class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Tên sản phẩm</th>
                                <th class="px-4 py-2 border">Giá</th>
                                <th class="px-4 py-2 border">Mã SKU</th>
                                <th class="px-4 py-2 border">Màu sắc</th>
                                <th class="px-4 py-2 border">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr class="hover:bg-gray-50 cursor-pointer">
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($product['id']) ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($product['name']) ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars(number_format($product['price'], 0, ',', '.')) ?> đ</td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($product['sku_code']) ?></td>
                                    <td class="px-4 py-2 flex items-center">
                                        <div class="inline-block w-6 h-6 rounded" style="background-color: <?= $product['hex_color'] ?>;"></div>
                                        <span class="ml-2"><?= $product['hex_color'] ?></span>
                                    </td>

                                    <td class="px-4 py-2 border">
                                        <a href="?action=edit_product&id=<?= urlencode($product['id']) ?>"
                                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Chỉnh sửa</a>
                                        <a href="?action=delete_product&id=<?= urlencode($product['id']) ?>"
                                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 mx-4"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                                        <a href="?action=add_color&id=<?= urlencode($product['id']) ?>"
                                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Thêm màu</a>
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