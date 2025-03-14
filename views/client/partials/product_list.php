 <div class="grid grid-cols-<?= $grid ?> gap-8 mb-8">
     <?php foreach ($products as $product): ?>
         <div class="relative">
             <a href="?action=product&id=<?= urlencode($product['id']) ?>" class="group relative block w-full">
                 <img src="<?= $this->WebModel->getMainProductImage($product['id']) ?>"
                     alt="Main Image"
                     class="main-image w-full transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">
                 <img src="<?= $this->WebModel->getHoverProductImage($product['id']) ?>"
                     alt="Hover Image"
                     class="hover-image w-full absolute top-0 left-0 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">
             </a>
             <div class="flex gap-2 py-2 justify-between items-center">
                 <div class="flex gap-2 py-2">
                     <?php $productcolor = $this->WebModel->getAllColorBySku($product['sku_code'], $product['id']);
                        foreach ($productcolor as $color):
                            $isLight = $this->isLightColor($color['hex_color']);
                            $isSelected = ($color['id'] === $product['id']);
                        ?>
                         <a href=" ?action=product&id=<?= urlencode($color['id']) ?>" class="block">
                             <div
                                 class="rounded-full w-4 h-4 relative flex items-center justify-center <?= $isLight ? 'border border-gray-300' : '' ?>"
                                 style="background-color: <?= $color['hex_color'] ?>;">
                                 <?php if ($isSelected): ?>
                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current <?= $isLight ? 'text-gray-400' : 'text-white' ?>" viewBox="0 0 448 512">
                                         <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                     </svg>
                                 <?php endif; ?>
                             </div>
                         </a>
                     <?php endforeach; ?>
                 </div>
                 <?php
                    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
                    $productId = $product['id'];
                    $isInWishlist = ($user_id) ? $this->checkWishlistStatus($user_id, $productId) : false;
                    ?>
                 <a href="<?= $user_id ? 'javascript:void(0);' : '?action=showFormlogin'; ?>" class="add-wishlist <?php if ($isInWishlist) {
                                                                                                                        echo 'hidden';
                                                                                                                    } ?>" data-id="<?= $product['id'] ?>">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 text-gray-600">
                         <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                     </svg>
                 </a>
                 <a href="javascript:void(0);" class="remove-wishlist <?php if (!$isInWishlist) {
                                                                            echo 'hidden';
                                                                        } ?>" data-id="<?= $product['id'] ?>">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                         <path fill="#ff0000" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                     </svg>
                 </a>
             </div>
             <a href="?action=product&id=<?= urlencode($product['id']) ?>" class="text-sm block hover:text-red-500">
                 <?= htmlspecialchars($product['name']) ?>
             </a>
             <div class="font-semibold pt-4"><?= number_format($product['price'], 0, ',', '.') ?>đ</div>
             <div>
                 <div class="w-8 h-8 bg-black hover:bg-white border border-transparent hover:border-black rounded-tl-[10px] rounded-br-[10px] absolute right-0 bottom-0 flex items-center justify-center transition-all duration-300 group">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4 h-4 fill-current text-white group-hover:text-black transition-all duration-300">
                         <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                     </svg>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>
 </div>