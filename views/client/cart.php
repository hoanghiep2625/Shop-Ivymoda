<?php require_once "partials/header.php" ?>

<body class="mx-[8%]">
    <?php $this->menu(); ?>
    <article class="grid grid-cols-[4fr_1.5fr] gap-10 mt-[100px]">
        <div>
            <div class="border w-full h-[96.6px] flex justify-center rounded-tl-[20px] rounded-br-[20px] ">
                <div class="w-[14px] h-[14px] rounded border-2 border-[#e7e8e9] rounded-full bg-black mt-6 z-10 relative">
                    <p class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Giỏ hàng
                    </p>
                </div>
                <div class=" h-[3px] w-[350px] bg-[#e7e8e9] mx-2 mt-[30px]"></div>
                <div class="w-[14px] h-[14px] rounded rounded-full bg-white border-2 border-[#e7e8e9] mt-6 z-10 relative">
                    <div class="text-[12px] mt-4 left-[-20px] w-16 absolute ">
                        Đặt hàng
                    </div>
                </div>
                <div class=" h-[3px] w-[350px] bg-[#e7e8e9] mx-2 mt-[30px]"></div>
                <div class="w-[14px] h-[14px] rounded rounded-full bg-white border-2 border-[#e7e8e9]  mt-6 z-10 relative">
                    <div class="text-[12px] mt-4 left-[-40px] w-28 absolute ">
                        Hoàn thành đơn
                    </div>
                </div>
            </div>
            <div class="flex gap-2 mb-4">
                <div class="text-[24px] font-semibold">
                    Giỏ hàng của bạn
                </div>
                <div id="totalProductDisplay" class="text-[24px] text-[#d73831] font-semibold">
                    <?= $totalproduct ?> Sản Phẩm
                </div>
            </div>
            <div>
                <table class="w-full bg-white table-auto border-collapse">
                    <thead class="border-b bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Ảnh sản phẩm</th> <!-- Cột ảnh -->
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tên sản phẩm</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Số lượng</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Size</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tổng tiền</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $item): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img src="<?= $this->WebModel->getMainProductImage($item['id']) ?>" alt="Image" class="w-28 h-[140px] object-cover rounded">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $item['name']; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <div class="flex items-center gap-4">
                                        <div class="relative flex items-center justify-center w-[5.5rem] h-8 my-4">
                                            <button id="decreaseBtn"
                                                data-id="<?= $item['cart_id'] ?>"
                                                class="flex items-center justify-center border w-8 h-8 rounded rounded-tl-[15px] rounded-br-[15px] text-xl absolute left-0 top-0 z-20">
                                                -
                                            </button>
                                            <div id="quantityDisplay-<?= $item['cart_id'] ?>"
                                                class="flex items-center justify-center text-center text-sm border-y w-12 h-full z-10 bg-white">
                                                <?= $item['quantity'] ?>
                                            </div>
                                            <button id="increaseBtn"
                                                data-id="<?= $item['cart_id'] ?>"
                                                class="flex items-center justify-center border w-8 h-8 rounded rounded-tl-[15px] rounded-br-[15px] text-xl absolute right-0 top-0 z-20">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $item['size']; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700" id="totalPriceProduct-<?php echo $item['cart_id']; ?>">
                                    <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.') . ' đ'; ?>
                                </td>
                                <td class="px-4 py-2 text-sm text-red-500 cursor-pointer" id="removeBtn-<?php echo $item['cart_id']; ?>">Xóa</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                <a
                    class="bg-white border border-black w-[250px] transition-all pt-[14px] pr-[24px] pb-[14px] pl-[24px] rounded-tl-[20px] rounded-br-[20px] hover:bg-black hover:text-white flex"
                    href="javascript:history.back()">
                    <div class="mx-auto font-semibold">
                        <= Tiếp tục mua hàng
                            </div>
                </a>
            </div>
        </div>
        <div>
            <div class="bg-[#fbfbfc] p-[22px] w-[400px]">
                <div class="text-[20px] text-[#221F20]">
                    Tổng tiền giỏ hàng
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Tổng sản phẩm</div>
                        <div id="totalProduct"><?= $totalproduct ?></div>
                    </div>
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Tổng tiền hàng</div>
                        <div id="totalPrice"><?= number_format($tong, 0, ',', '.') ?> đ</div>
                    </div>
                </div><br>
                <div class="text-[14px] text-[57585A]">
                    <div class="flex justify-between">
                        <div>Tạm tính</div>
                        <div id="tempTotal" class="font-semibold"><?= number_format($tong, 0, ',', '.') ?> đ</div>
                    </div>
                </div>
                <div class="text-[14px] text-[#AC2F33] my-6">
                    Sản phẩm nằm trong chương trình đồng giá, giảm giá trên 50% không hỗ trợ đổi trả
                </div>
                <hr>
            </div>
            <div>
                <?php if ($totalproduct == 0): ?>
                    <script>
                        alert("Giỏ hàng của bạn trống, vui lòng thêm sản phẩm để đặt hàng.");
                    </script>
                <?php else: ?>
                    <a href="?action=hoanthanhdon"
                        class="bg-black border border-black text-white font-semibold transition-all hover:bg-white hover:text-black
            hover:border w-[400px]  pt-[14px] pr-[24px] pb-[14px] pl-[24px] rounded-tl-[20px] rounded-br-[20px] flex ">
                        <div class="mx-auto">
                            ĐẶT HÀNG
                        </div>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </article>
    <hr class="mt-10">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateQuantity(productId, delta) {
                fetch("?action=updateQuantity", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            id: productId,
                            delta: delta
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const quantityDisplay = document.getElementById(`quantityDisplay-${productId}`);
                            if (quantityDisplay) {
                                quantityDisplay.textContent = data.newQuantity;
                            }
                            const totalPriceProductEl = document.getElementById(`totalPriceProduct-${productId}`);
                            if (totalPriceProductEl) {
                                totalPriceProductEl.textContent = numberWithCommas(data.newQuantity * data.price) + " đ";
                            }
                            document.getElementById("totalProductDisplay").textContent = numberWithCommas(data.totalProduct) + " Sản Phẩm";
                            document.getElementById("tempTotal").textContent = numberWithCommas(data.totalPrice) + " đ";
                            document.getElementById("totalProduct").textContent = data.totalProduct;
                            document.getElementById("totalPrice").textContent = numberWithCommas(data.totalPrice) + " đ";
                        } else {
                            alert(data.message || "Cập nhật thất bại.");
                        }
                    })

                    .catch(error => {
                        console.error("Lỗi khi gửi yêu cầu:", error);
                        alert("Đã xảy ra lỗi, vui lòng thử lại.");
                    });
            }
            document.querySelectorAll("#decreaseBtn").forEach(button => {
                button.addEventListener("click", function() {
                    const productId = this.dataset.id;
                    updateQuantity(productId, -1);
                });
            });

            document.querySelectorAll("#increaseBtn").forEach(button => {
                button.addEventListener("click", function() {
                    const productId = this.dataset.id;
                    updateQuantity(productId, 1);
                });
            });

            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("[id^='removeBtn-']").forEach(button => {
                button.addEventListener("click", function() {
                    const cartId = this.id.split("-")[1];
                    const userId = <?= $_SESSION['id'] ?>;
                    fetch('?action=removeProductFromCart', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                cart_id: cartId,
                                user_id: userId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const row = document.querySelector(`#removeBtn-${cartId}`).closest('tr');
                                row.remove();
                                document.getElementById("totalProductDisplay").textContent = numberWithCommas(data.totalProduct) + " Sản Phẩm";
                                document.getElementById("tempTotal").textContent = numberWithCommas(data.totalPrice) + " đ";
                                document.getElementById("totalProduct").textContent = data.totalProduct;
                                document.getElementById("totalPrice").textContent = numberWithCommas(data.totalPrice) + " đ";
                            } else {
                                alert(data.message || 'Xóa sản phẩm thất bại.');
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi khi gửi yêu cầu:', error);
                            alert('Đã xảy ra lỗi, vui lòng thử lại.');
                        });
                });
            });
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
</body>
<?php require_once "partials/footer.php" ?>

</html>