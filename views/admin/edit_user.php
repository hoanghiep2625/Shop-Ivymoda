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
                    <h2 class="text-xl font-semibold mb-4">Chỉnh sửa thông tin người dùng</h2>
                    <form action="process_edit_user.php" method="POST" class="space-y-4">
                        <!-- Hidden input để lưu ID người dùng -->
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>">

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" id="first_name"
                                    value="<?= htmlspecialchars($user['first_name']) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" id="last_name"
                                    value="<?= htmlspecialchars($user['name']) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    value="<?= htmlspecialchars($user['email']) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" id="phone"
                                    value="<?= htmlspecialchars($user['phone']) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700">Join Date</label>
                                <input type="text"
                                    value="<?= htmlspecialchars($user['join_date']) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" disabled>
                            </div>
                            <div>
                                <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
                                <select name="sex" id="sex"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="Male" <?= $user['sex'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= $user['sex'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" id="city"
                                    value="<?= htmlspecialchars($city_name) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                                <input type="text" name="district" id="district"
                                    value="<?= htmlspecialchars($district_name) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="commune" class="block text-sm font-medium text-gray-700">Commune</label>
                                <input type="text" name="commune" id="commune"
                                    value="<?= htmlspecialchars($commune_name) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" id="address"
                                    value="<?= htmlspecialchars($user['address']) ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <!-- Nút cập nhật -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700">
                                Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <?php include "partials/footer.php"; ?>