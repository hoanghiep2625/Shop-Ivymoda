<style>
    article {
        margin-top: 70px;
    }
</style>

<header class="flex justify-between items-center py-4 bg-white fixed top-0 w-[84%] left-0 z-50 mx-[8%] shadow-sm">
    <div class="flex items-center">
        <?php foreach ($categories as $category):
            $subcategory = $this->WebModel->getSubCategoriesByParentCategoryId($category['id']);
        ?>
            <div class="relative group">
                <a href="#" class="text-[14px] font-semibold text-gray-800 mr-4 hover:text-red-500 transition-all duration-300"><?= mb_convert_case(htmlspecialchars($category['name']), MB_CASE_UPPER, "UTF-8") ?></a>
                <div class="absolute left-0 w-[800px] mt-2 bg-white border border-gray-200 rounded-lg shadow-lg p-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
                    <table class="w-auto">
                        <thead>
                            <tr>
                                <?php foreach ($subcategory as $item):
                                    $sub_sub_categories = $this->WebModel->getSubSubCategoriesByParentSubcategoryId($item['id']);
                                ?>
                                    <th class="text-left font-semibold text-sm">
                                        <a href="?action=search"><?= htmlspecialchars($item['name']) ?></a>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($subcategory as $item):
                                    $sub_sub_categories = $this->WebModel->getSubSubCategoriesByParentSubcategoryId($item['id']);
                                ?>
                                    <td class="text-left py-2 align-top">
                                        <?php foreach ($sub_sub_categories as $sub_sub_category): ?>
                                            <a href="#" class="block mb-2 h-auto min-w-[100px] text-sm pr-4"><?= htmlspecialchars($sub_sub_category['name']) ?></a>
                                        <?php endforeach; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>

        <a href="#" class="text-sm font-semibold text-[rgb(255,0,0)] mr-4">THÁNG VÀNG SĂN SALE</a>
        <a href="#" class="text-sm font-semibold text-gray-800 mr-4 hover:text-red-500 transition-all duration-300">BỘ SƯU TẬP</a>
        <a href="#" class="text-sm font-semibold text-gray-800 hover:text-red-500 transition-all duration-300">VỀ CHÚNG TÔI</a>
    </div>

    <div class="flex items-center">
        <a href="?action=home"><img src="./public/image/logo.png" alt="Logo" class="w-32 h-auto" /></a>
    </div>
    <div class="flex items-center">
        <div class="w-80 h-9 border flex">
            <div class="flex px-2 gap-4 items-center">
                <form action="?action=search" method="GET">
                    <button type="submit">
                        <img src="./public/icon/search.svg" alt="" class="w-4 h-auto" />
                    </button>
                    <input type="text" name="searchname" id="searchname" placeholder="TÌM KIẾM SẢN PHẨM" class="text-xs p-0 outline-none border-0 focus:outline-none focus:ring-0" />
                </form>
            </div>
        </div>
        <a href="#" class="ml-4"><img src="./public/icon/headphone.svg" alt="Headphone" class="w-5 h-auto" /></a>
        <?php if (!isset($_SESSION['email'])) : ?>
            <a href="?action=showFormlogin" class="ml-4">
                <img src="./public/icon/user.svg" alt="User" class="w-5 h-auto" />
            </a>
        <?php else : ?>
            <div class="ml-4 relative group">
                <img src="./public/icon/user.svg" alt="User" class="w-5 h-auto cursor-pointer" id="user-icon" />
                <div id="dropdown-menu" class="absolute right-0 w-64 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg p-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
                    <a href="?action=info" class="font-semibold mb-2 block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">Tài khoản của tôi</a>
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <a href="?action=thongke" class="block mb-2 px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">Quản trị website</a>
                    <?php endif; ?>
                    <a href="?action=info" class="block mb-2 px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">Thông tin tài khoản</a>
                    <a href="#" class="block mb-2 px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">Sổ địa chỉ</a>
                    <a href="?action=logout" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">Đăng xuất</a>
                </div>
            </div>

        <?php endif; ?>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const userIcon = document.getElementById("user-icon");
                const dropdownMenu = document.getElementById("dropdown-menu");

                // Toggle menu on click
                userIcon.addEventListener("click", () => {
                    dropdownMenu.classList.toggle("hidden");
                });

                // Close dropdown if clicked outside
                document.addEventListener("click", (event) => {
                    if (!userIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add("hidden");
                    }
                });
            });
        </script>
        <a href="?action=cart" class="ml-4 mr-8"><img src="./public/icon/cart.svg" alt="Cart" class="w-5 h-auto" /></a>
    </div>
</header>
<hr />