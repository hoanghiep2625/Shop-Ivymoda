<?php
include "partials/header.php";
?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col ml-64">
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center fixed w-full">
                <div class="text-lg font-bold">Thêm sản phẩm</div>
            </header>
            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100 pt-16">
                <div class="bg-white p-6 shadow rounded">
                    <h2 class="text-2xl font-bold mb-4">Thêm Sản Phẩm Mới</h2>
                    <form action="process_add_product.php" method="POST" enctype="multipart/form-data" class="space-y-4">

                        <!-- Thông tin sản phẩm -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
                                <input type="number" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="color" class="block text-sm font-medium text-gray-700">Màu sắc</label>
                                <input type="text" id="color" name="color" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div>
                                <label for="categorySelect" class="block text-sm font-medium text-gray-700">Danh mục</label>
                                <select id="categorySelect" onchange="updateSubcategories()" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Chọn danh mục</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                                <input type="file" id="main_image" name="main_image" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" onchange="previewMainImage(event)">
                            </div>
                            <div>
                                <label for="subcategorySelect" class="block text-sm font-medium text-gray-700">Phụ mục</label>
                                <select id="subcategorySelect" onchange="updateSubSubcategories()" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Chọn phụ mục</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="sub_images" class="block text-sm font-medium text-gray-700">Ảnh phụ</label>
                                <input type="file" id="sub_images" name="sub_images[]" multiple class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500" onchange="previewSubImages(event)">
                            </div>
                            <div>
                                <label for="subSubcategorySelect" class="block text-sm font-medium text-gray-700">Sub-subcategory</label>
                                <select id="subSubcategorySelect" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Chọn sub-subcategory</option>
                                </select>
                            </div>
                        </div>

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
                                <tbody>
                                    <tr>
                                        <?php
                                        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                                        foreach ($sizes as $size) {
                                            echo "
                                        <td class='border border-gray-300 px-4 py-2'>$size</td>
                                        ";
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                                        foreach ($sizes as $size) {
                                            echo "
                                        <td class='border border-gray-300 px-4 py-2'>
                                            <input type='number' name='stock[$size]' placeholder='Nhập số lượng' class='w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500'>
                                        </td>
                                        ";
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

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
    <script>
        const data = <?php echo $categoriesDataJson; ?>;

        function updateCategories() {
            const categorySelect = document.getElementById('categorySelect');
            const uniqueCategories = [...new Set(data.map(item => item.category_id))];

            categorySelect.innerHTML = '<option value="">Chọn danh mục</option>';

            uniqueCategories.forEach(categoryId => {
                const category = data.find(item => item.category_id === categoryId);
                const option = document.createElement('option');
                option.value = category.category_id;
                option.textContent = category.category_name;
                categorySelect.appendChild(option);
            });
        }

        function updateSubcategories() {
            const categorySelect = document.getElementById('categorySelect');
            const subcategorySelect = document.getElementById('subcategorySelect');
            const selectedCategoryId = categorySelect.value;

            // Lọc các phụ mục tương ứng với danh mục đã chọn
            const subcategories = data.filter(item => item.category_id == selectedCategoryId);

            // Dùng Set để loại bỏ các phụ mục trùng lặp
            const uniqueSubcategories = Array.from(new Set(subcategories.map(item => item.subcategory_id)))
                .map(id => subcategories.find(item => item.subcategory_id === id));

            // Xóa các lựa chọn cũ
            subcategorySelect.innerHTML = '<option value="">Chọn phụ mục</option>';

            uniqueSubcategories.forEach(item => {
                const option = document.createElement('option');
                option.value = item.subcategory_id;
                option.textContent = item.subcategory_name;
                subcategorySelect.appendChild(option);
            });

            // Reset sub-subcategory
            updateSubSubcategories();
        }


        // Cập nhật sub-subcategory dựa trên phụ mục đã chọn
        function updateSubSubcategories() {
            const subcategorySelect = document.getElementById('subcategorySelect');
            const subSubcategorySelect = document.getElementById('subSubcategorySelect');
            const selectedSubcategoryId = subcategorySelect.value;

            const subSubcategories = data.filter(item => item.subcategory_id == selectedSubcategoryId && item.sub_subcategory_id != null);

            // Xóa các lựa chọn cũ
            subSubcategorySelect.innerHTML = '<option value="">Chọn sub-subcategory</option>';

            subSubcategories.forEach(item => {
                const option = document.createElement('option');
                option.value = item.sub_subcategory_id;
                option.textContent = item.sub_subcategory_name;
                subSubcategorySelect.appendChild(option);
            });
        }

        // Gọi updateCategories() khi load trang để điền dữ liệu vào danh mục
        window.onload = updateCategories;

        function previewMainImage(event) {
            const preview = document.getElementById('main_image_preview');
            preview.innerHTML = '';
            const file = event.target.files[0];
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.alt = "Ảnh chính";
                img.classList.add('w-32', 'h-32', 'object-cover', 'mt-2');
                preview.appendChild(img);
            }
        }

        function previewSubImages(event) {
            const preview = document.getElementById('sub_images_preview');
            preview.innerHTML = '';

            const files = event.target.files;
            const fileArray = Array.from(files);

            fileArray.forEach((file, index) => {
                const imgWrapper = document.createElement('div');
                imgWrapper.classList.add('inline-block', 'relative', 'mr-2', 'mb-2');

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.alt = "Ảnh phụ";
                img.classList.add('w-32', 'h-32', 'object-cover');

                const deleteButton = document.createElement('button');
                deleteButton.innerHTML = 'Xóa';
                deleteButton.classList.add('absolute', 'top-0', 'right-0', 'bg-red-500', 'text-white', 'p-1', 'rounded-full');
                deleteButton.onclick = function() {
                    removeFileFromInput(event.target, index);
                    imgWrapper.remove();
                    if (event.target.files.length === 0) {
                        preview.innerHTML = '';
                    } else {
                        previewSubImages(event);
                    }
                };

                imgWrapper.appendChild(img);
                imgWrapper.appendChild(deleteButton);
                preview.appendChild(imgWrapper);
            });
        }

        function removeFileFromInput(inputElement, index) {
            const files = inputElement.files;
            const fileArray = Array.from(files);
            fileArray.splice(index, 1);
            const newDataTransfer = new DataTransfer();
            fileArray.forEach(file => newDataTransfer.items.add(file));
            inputElement.files = newDataTransfer.files;
        }
    </script>
</body>