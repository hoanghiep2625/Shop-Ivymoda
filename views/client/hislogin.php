<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php $this->menu(); ?>
    <article class="mt-[90px]">
        <div class="flex gap-4 my-4">
            <div class="text-sm"><a href="?action=home">Trang chủ</a></div>
            <div class="text-sm">-</div>
            <div class="text-sm"> Tài khoản của tôi</div>
        </div>
        <hr class="mb-8">
        <div class="grid grid-cols-[1.2fr_5fr] gap-36">
            <?php require_once "partials/menupro5.php" ?>
            <div class="min-h-[350px]">
                <div class="font-semibold text-2xl mb-4">Lịch sử đăng nhập</div>
                <?php if (!empty($hislogin)): ?>
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-left border-b p-2">Thiết bị</th>
                                <th class="text-left border-b p-2">Địa chỉ IP</th>
                                <th class="text-left border-b p-2">Trình duyệt</th>
                                <th class="text-left border-b p-2">Thiết bị</th>
                                <th class="text-left border-b p-2">Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hislogin as $login): ?>
                                <tr>
                                    <td class="border-b p-2 text-sm"><?php echo htmlspecialchars($login['device']); ?></td>
                                    <td class="border-b p-2 text-sm"><?php echo htmlspecialchars($login['ip_address']); ?></td>
                                    <td class="border-b p-2 text-sm"><?php echo htmlspecialchars($login['user_agent']); ?></td>
                                    <td class="border-b p-2 text-sm"><?php echo htmlspecialchars($login['device']); ?></td>
                                    <td class="border-b p-2 text-sm"><?php echo htmlspecialchars($login['login_time']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-gray-500">Chưa có lịch sử đăng nhập.</p>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </article>
    <hr>
    <script src="views/client/js/changecolormenupro5.js"></script>
</body>
<?php require_once "partials/footer.php" ?>

</html>