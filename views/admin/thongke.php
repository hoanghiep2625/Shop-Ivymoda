<?php include "partials/header.php"; ?>

<body class="h-screen bg-gray-100 font-sans">
    <!-- Wrapper -->
    <div class="flex h-full">
        <?php include "partials/menu.php"; ?>
        <div class="flex-1 flex flex-col">
            <!-- Top Navbar -->
            <header class="bg-white shadow px-4 py-2 flex justify-between items-center">
                <div class="text-lg font-bold">Thống kê</div>
            </header>

            <!-- Main Section -->
            <main class="p-4 flex-grow bg-gray-100">
                <div class="bg-white p-6 shadow rounded">
                    <h1 class="text-xl font-bold mb-4">Welcome to Admin Dashboard</h1>
                    <p>This is your main content area. Customize it as you like!</p>
                </div>
            </main>
        </div>
    </div>

</body>
<?php include "partials/footer.php"; ?>

</html>