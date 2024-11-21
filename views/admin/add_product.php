<?php
include "partials/header.php";
?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col">
            <!-- Top Navbar -->
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center">
                <div class="text-lg font-bold">Thêm sản phẩm</div>
            </header>

            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100">
                <div class="bg-white p-6 shadow rounded">
                    <h2 class="text-2xl font-bold mb-4">Thêm Sản Phẩm Mới</h2>
                    <form action="process_add_product.php" method="POST" enctype="multipart/form-data">

                        <!-- Thông tin sản phẩm -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                            <input type="number" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium text-gray-700">Màu sắc</label>
                            <input type="text" id="color" name="color" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Hình ảnh</label>

                            <!-- Ảnh chính -->
                            <div class="mb-4">
                                <label for="main_image" class="block text-sm font-medium text-gray-700">Ảnh chính</label>
                                <input type="file" id="main_image" name="main_image" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" onchange="previewMainImage(event)">
                                <div id="main_image_preview" class="mt-2"></div> <!-- Chỗ để hiển thị ảnh chính -->
                            </div>

                            <!-- Ảnh phụ -->
                            <div class="mb-4">
                                <label for="sub_images" class="block text-sm font-medium text-gray-700">Ảnh phụ</label>
                                <input type="file" id="sub_images" name="sub_images[]" multiple class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" onchange="previewSubImages(event)">

                                <!-- Hiển thị ảnh phụ đã chọn -->
                                <div id="sub_images_preview" class="mt-2"></div>
                                <p class="mt-2 text-sm text-gray-500">Có thể chọn nhiều ảnh.</p>
                            </div>
                        </div>

                        <script>
                            // Hiển thị ảnh chính đã chọn
                            function previewMainImage(event) {
                                const preview = document.getElementById('main_image_preview');
                                preview.innerHTML = ''; // Xóa ảnh cũ nếu có
                                const file = event.target.files[0];
                                if (file) {
                                    const img = document.createElement('img');
                                    img.src = URL.createObjectURL(file);
                                    img.alt = "Ảnh chính";
                                    img.classList.add('w-32', 'h-32', 'object-cover', 'mt-2');
                                    preview.appendChild(img);
                                }
                            }

                            // Hiển thị ảnh phụ đã chọn và cho phép xóa ảnh
                            function previewSubImages(event) {
                                const preview = document.getElementById('sub_images_preview');
                                preview.innerHTML = ''; // Xóa ảnh cũ nếu có

                                const files = event.target.files;
                                const fileArray = Array.from(files);

                                // Lặp qua từng file và hiển thị ảnh
                                fileArray.forEach((file, index) => {
                                    const imgWrapper = document.createElement('div');
                                    imgWrapper.classList.add('inline-block', 'relative', 'mr-2', 'mb-2');

                                    const img = document.createElement('img');
                                    img.src = URL.createObjectURL(file);
                                    img.alt = "Ảnh phụ";
                                    img.classList.add('w-32', 'h-32', 'object-cover');

                                    // Thêm nút xóa ảnh
                                    const deleteButton = document.createElement('button');
                                    deleteButton.innerHTML = 'Xóa';
                                    deleteButton.classList.add('absolute', 'top-0', 'right-0', 'bg-red-500', 'text-white', 'p-1', 'rounded-full');
                                    deleteButton.onclick = function() {
                                        removeFileFromInput(event.target, index); // Xóa ảnh khỏi danh sách file input
                                        imgWrapper.remove(); // Xóa ảnh phụ khi click nút xóa
                                        // Cập nhật lại giao diện khi ảnh bị xóa
                                        if (event.target.files.length === 0) {
                                            preview.innerHTML = ''; // Nếu không còn ảnh, xóa phần hiển thị ảnh phụ
                                        } else {
                                            previewSubImages(event); // Cập nhật lại phần hiển thị ảnh phụ
                                        }
                                    };

                                    imgWrapper.appendChild(img);
                                    imgWrapper.appendChild(deleteButton);
                                    preview.appendChild(imgWrapper);
                                });
                            }

                            // Xóa file khỏi input khi nút xóa được nhấn
                            function removeFileFromInput(inputElement, index) {
                                const files = inputElement.files;
                                const fileArray = Array.from(files);
                                fileArray.splice(index, 1); // Xóa file đã chọn
                                const newDataTransfer = new DataTransfer();
                                fileArray.forEach(file => newDataTransfer.items.add(file)); // Thêm lại các file còn lại
                                inputElement.files = newDataTransfer.files;
                            }
                        </script>

                        <div class="mb-4">
                            <label for="short_description" class="block text-sm font-medium text-gray-700">Giới thiệu ngắn</label>
                            <textarea id="short_description" name="short_description" rows="3" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="full_description" class="block text-sm font-medium text-gray-700">Mô tả chi tiết</label>
                            <textarea id="full_description" name="full_description" rows="6" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700">Kích cỡ & Số lượng tồn kho</label>
                            <table class="w-full border-collapse border border-gray-300 mt-4">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border border-gray-300 px-4 py-2 text-left">Size</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Tồn kho</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                                    foreach ($sizes as $size) {
                                        echo "
                <tr>
                    <td class='border border-gray-300 px-4 py-2'>$size</td>
                    <td class='border border-gray-300 px-4 py-2'>
                        <input type='number' name='stock[$size]' placeholder='Nhập số lượng' class='w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500'>
                    </td>
                </tr>
                ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>



                        <!-- Nút hành động -->
                        <div class="flex justify-end">
                            <button type="reset" class="mr-4 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded shadow">Hủy</button>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded shadow">Thêm sản phẩm</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <?php include "partials/footer.php"; ?>

    <!-- JavaScript -->
    <script>
    </script>
</body>