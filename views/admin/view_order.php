<?php include "partials/header.php"; ?>

<body class="h-screen bg-gray-100 font-sans">
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col ml-64">
            <header class="bg-white shadow px-6 py-3 flex justify-between items-center fixed w-full">
                <h1 class="text-2xl font-bold text-gray-800">Chi tiết đơn hàng #<?= $order_id ?></h1>
            </header>
            <main class="p-6 flex-grow bg-gray-100 pt-20">
                <div class="bg-white p-8 shadow-lg rounded-lg">
                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-gray-700 border-b pb-2 mb-4">Thông tin đơn hàng</h2>
                        <div class="grid grid-cols-2 gap-6 text-sm">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Mã đơn hàng:</span>
                                <span class="font-semibold text-gray-800">#<?= $order_id ?? 'Không hợp lệ' ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Ngày đặt hàng:</span>
                                <span><?= $order['order_date'] ?? 'Không hợp lệ' ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Trạng thái:</span>
                                <span class="font-semibold flex items-center" id="status-text">
                                    <div id="status-label" class="pr-2">
                                        <?php
                                        if ($order['status'] == 'pending') {
                                            echo '<div class="text-yellow-500">Pending (Đang chờ xử lý)</div>';
                                        } else if ($order['status'] == 'processing') {
                                            echo '<div class="text-blue-500">Processing (Xử lý)</div>';
                                        } else if ($order['status'] == 'completed') {
                                            echo '<div class="text-green-500">Completed (Hoàn tất)</div>';
                                        } else if ($order['status'] == 'cancelled') {
                                            echo '<div class="text-red-500">Cancelled (Huỷ)</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="relative group">
                                        <a href="#" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5">
                                                <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                            </svg>
                                        </a>
                                        <div class="absolute left-0 mt-2 min-w-[300px] bg-white border border-gray-200 rounded-lg shadow-lg p-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
                                            <a href="#" class="block px-4 py-2 text-sm text-yellow-500 hover:bg-gray-100" onclick="confirmUpdateStatus('pending')">Pending (Đang chờ xử lý)</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-blue-500 hover:bg-gray-100" onclick="confirmUpdateStatus('processing')">Processing (Xử lý)</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-green-500 hover:bg-gray-100" onclick="confirmUpdateStatus('completed')">Completed (Hoàn tất)</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100" onclick="confirmUpdateStatus('cancelled')">Canceled (Huỷ)</a>
                                        </div>
                                    </div>
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Tổng tiền:</span>
                                <span class="text-red-600 font-bold"><?= number_format($order['total_price'] ?? 'Không hợp lệ') ?> đ</span>
                            </div>
                        </div>
                    </section>
                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-gray-700 border-b pb-2 mb-4">Thông tin khách hàng</h2>
                        <div class="space-y-4 text-sm">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Họ và tên:</span>
                                <span class="font-semibold"><?= $user['first_name'] . ' ' . $user['name'] ?? 'Không hợp lệ' ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Số điện thoại:</span>
                                <span><?= $user['phone'] ?? 'Không hợp lệ' ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Địa chỉ:</span>
                                <span><?= $user['address'] ?>, <?= $commune_name ?>, <?= $district_name ?>, <?= $city_name ?? 'Không hợp lệ' ?></span>
                            </div>
                        </div>
                    </section>

                    <!-- Product Details -->
                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-gray-700 border-b pb-2 mb-4">Sản phẩm trong đơn hàng</h2>
                        <table class="w-full table-auto mt-4 text-sm">
                            <thead>
                                <tr class="text-left bg-gray-100 text-gray-700">
                                    <th class="px-4 py-2 w-12">#</th>
                                    <th class="border-b px-4 py-2">Ảnh</th>
                                    <th class="border-b px-4 py-2">Sản phẩm</th>
                                    <th class="border-b px-4 py-2">Số lượng</th>
                                    <th class="border-b px-4 py-2">Size</th>
                                    <th class="border-b px-4 py-2">Đơn giá</th>
                                    <th class="border-b px-4 py-2">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orderDetails as $index => $product): ?>
                                    <tr class="hover:bg-gray-50 transition-all duration-300">
                                        <td class="border-b px-4 py-2"><?= $index + 1 ?></td>
                                        <td class="border-b px-4 py-2">
                                            <img src="<?= $this->AdminModel->getMainProductImage($product['product_id']) ?>" alt="<?= $product['product_name'] ?>" class="w-12 h-12 object-cover rounded-md mx-auto">
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
                    </section>
                    <!-- Actions -->
                    <div class="flex justify-end space-x-4">
                        <button class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                            In hóa đơn
                        </button>
                        <a href="javascript:history.back()" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg shadow hover:bg-gray-400 transition">
                            Quay lại
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include "partials/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const orderId = <?= $order_id ?>;
    </script>
    <script>
        let selectedStatus = '';

        function confirmUpdateStatus(status) {
            selectedStatus = status;
            let message = `Bạn có chắc chắn muốn thay đổi trạng thái thành ${status === 'pending' ? 'Đang chờ xử lý' : 
    status === 'processing' ? 'Xử lý' :
    status === 'completed' ? 'Hoàn tất' :
    'Huỷ'}?`;

            Swal.fire({
                title: 'Xác nhận',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50',
                    cancelButton: 'bg-gray-500 text-white py-2 px-6 rounded-md hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    updateStatus(status);
                }
            });
        }


        function updateStatus(status) {
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '?action=editstatusorder', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        Swal.fire({
                            title: 'Thành công!',
                            text: `Trạng thái đã được thay đổi thành ${status === 'pending' ? 'Đang chờ xử lý' : 
                        status === 'processing' ? 'Xử lý' :
                        status === 'completed' ? 'Hoàn tất' : 'Huỷ'}`,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50'
                            }
                        });
                        const statusText = document.querySelector('#status-text');
                        const statusLabel = document.querySelector('#status-label');

                        if (statusText && statusLabel) {
                            statusLabel.textContent = status === 'pending' ? 'Pending (Đang chờ xử lý)' :
                                status === 'processing' ? 'Processing (Xử lý)' :
                                status === 'completed' ? 'Completed (Hoàn tất)' :
                                status === 'cancelled' ? 'Cancelled (Huỷ)' : '(Trạng thái không hợp lệ)';
                            statusText.classList.remove('text-yellow-500', 'text-blue-500', 'text-green-500', 'text-red-500');
                            if (status === 'pending') {
                                statusText.classList.add('text-yellow-500');
                            } else if (status === 'processing') {
                                statusText.classList.add('text-blue-500');
                            } else if (status === 'completed') {
                                statusText.classList.add('text-green-500');
                            } else if (status === 'cancelled') {
                                statusText.classList.add('text-red-500');
                            }
                        }
                    } else {
                        Swal.fire('Lỗi!', response.message, 'error');
                    }
                } else {
                    Swal.fire('Lỗi!', 'Có lỗi xảy ra khi cập nhật trạng thái', 'error');
                }
            };
            xhr.send('status=' + status + '&order_id=' + orderId);
        }
    </script>
</body>