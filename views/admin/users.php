<?php include "partials/header.php"; ?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col ml-64">
            <!-- Top Navbar -->
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center fixed w-full">
                <div class="text-lg font-bold">Danh sách người dùng</div>
            </header>

            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100 pt-16">
                <div class="bg-white p-6 shadow rounded">
                    <table id="export-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Họ
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
                                    <span class="flex items-center">
                                        Email
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th data-type="date" data-format="YYYY/MM/DD">
                                    <span class="flex items-center">
                                        Ngày tham gia
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
                            <?php foreach ($users as $user): ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($user['first_name']) ?></td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($user['name']) ?></td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($user['email']) ?></td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($user['join_date']) ?></td>
                                    <td>
                                        <a href="?action=chinh_sua_nguoi_dung&id=<?= urlencode($user['id']) ?>"
                                            class="text-blue-500 hover:underline">
                                            Edit
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