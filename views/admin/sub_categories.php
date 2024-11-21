<?php include "partials/header.php"; ?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col">
            <!-- Top Navbar -->
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center">
                <div class="text-lg font-bold">Danh mục con của "<?= $categories['name'] ?>"</div>
            </header>

            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100">
                <div class="bg-white p-6 shadow rounded">
                    <table id="export-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Id
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Tên
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sub_categories as $sub_categorie): ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($sub_categorie['id']) ?></td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($sub_categorie['name']) ?></td>
                                    <td>
                                        <a href="?action=chinh_sua_categories&id=<?= urlencode($sub_categorie['id']) ?>"
                                            class="text-white bg-blue-500 p-1 rounded-lg hover:underline">
                                            Edit
                                        </a>
                                        <a href="?action=nhanh_con_con_categories&category=<?= urlencode($categorie['id']) ?>&id=<?= urlencode($sub_categorie['id']) ?>"
                                            class="text-white bg-yellow-300 p-1 rounded-lg hover:underline">
                                            Nhánh con
                                        </a>
                                        <a href="?action=nhanh_con_categories&id=<?= urlencode($sub_categorie['id']) ?>"
                                            class="text-white bg-red-500 p-1 rounded-lg hover:underline">
                                            Xoá
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