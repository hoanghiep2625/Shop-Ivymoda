<?php
include './models/WebModel.php';
class WebController
{
    public $WebModel;
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }
    public function showFormlogin()
    {
        include "./views/client/login.php";
    }
    public function trangchu()
    {
        $productsnew = $this->WebModel->get5spnew();
        $productsfall = $this->WebModel->get5spfall();
        include "./views/client/home.php";
    }
    public function showFormreg()
    {
        include "./views/client/register.php";
    }
    public function addToViewedProducts($user_id, $productId)
    {
        $productExists = $this->WebModel->checkProductExists($user_id, $productId);

        if ($productExists) {
            return;
        }
        $viewedCount = $this->WebModel->getViewedCount($user_id);
        if ($viewedCount >= 6) {
            $this->WebModel->deleteOldestViewedProduct($user_id);
        }
        $this->WebModel->addProductViewed($user_id, $productId);
    }

    public function product()
    {
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;
        $email = $_SESSION['email'];
        $user_id = $_SESSION['id'];
        $this->addToViewedProducts($user_id, $id);
        $idviewedproduct = $this->WebModel->getViewedProducts($user_id, $id);
        $productview = $this->WebModel->getProductById($id);
        $sub_subcategories = $this->WebModel->getSubSubSategoriesById($productview['sub_subcategory_id']);
        $imgmain = $this->WebModel->getMainProductImage($productview['id']);
        $imgproduct = $this->WebModel->getProductImage($productview['id']);
        $size = $this->WebModel->getSizeProductByProductId($productview['id']);
        $sanphamtuongtu = $this->WebModel->getProductTuongTuBySubSubSategories($productview['sub_subcategory_id'], $productview['id'], $productview['color']);
        $productcolor = $this->WebModel->getAllColorBySku($productview['sku_code'], $id);
        $viewedProducts = [];
        foreach ($idviewedproduct as $viewed) {
            $viewedProduct = $this->WebModel->getProductById($viewed['product_id']);
            $viewedProducts[] = $viewedProduct;
        }
        include "./views/client/product.php";
    }

    public
    function isLightColor($hexColor)
    {
        $hexColor = ltrim($hexColor, '#');
        $r = hexdec(substr($hexColor, 0, 2));
        $g = hexdec(substr($hexColor, 2, 2));
        $b = hexdec(substr($hexColor, 4, 2));
        $brightness = ($r * 0.299 + $g * 0.587 + $b * 0.114);
        return $brightness > 300;
    }
    public function dieukhoan()
    {
        include "./views/client/chinh-sach-dieu-khoan.php";
    }
    public function qanda()
    {
        include "./views/client/q&a.php";
    }
    public function huongdanmuahang()
    {
        include "./views/client/huong-dan-mua-hang.php";
    }
    public function forgotpassword()
    {
        include "./views/client/forgotpassword.php";
    }
    public function chinhsachthanhtoan()
    {
        include "./views/client/chinh-sach-thanh-toan.php";
    }
    public function chinhsachdoitra()
    {
        include "./views/client/chinh-sach-doi-tra.php";
    }
    public function chinhsachbaohanh()
    {
        include "./views/client/chinh-sach-bao-hanh.php";
    }
    public function chinhsachvanchuyen()
    {
        include "./views/client/chinh-sach-giao-hang-van-chuyen.php";
    }
    public function chinhsachthethanhvien()
    {
        include "./views/client/chinh-sach-the-thanh-vien.php";
    }
    public function addToWishlist()
    {
        $user_id = $_SESSION['id'];
        $productId = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;
        if ($productId && !$this->WebModel->isProductInWishlist($user_id, $productId)) {
            $this->WebModel->addToWishlist($user_id, $productId);
            echo json_encode(['success' => true, 'action' => 'added']);
        } else {
            echo json_encode(['success' => false]);
        }

        exit;
    }
    public function removeFromWishlist()
    {
        $user_id = $_SESSION['id'];
        $productId = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;

        if ($productId && $this->WebModel->isProductInWishlist($user_id, $productId)) {
            $this->WebModel->removeFromWishlist($user_id, $productId);
            echo json_encode(['success' => true, 'action' => 'removed']);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;
    }
    public function showWishlist()
    {
        $user_id = $_SESSION['id'];
        $user = $this->WebModel->getUserByUserId($user_id);
        $wishlist = $this->WebModel->getWishlistByUserId($user_id);
        include './views/client/product_love.php';
    }
    public function cart()
    {
        $user_id = $_SESSION['id'];
        $cart = $this->WebModel->getAllCartByUserId($user_id);
        $totalproduct = $this->WebModel->getTotalQuantityByUserId($user_id);
        $tong = 0;
        foreach ($cart as $item) {
            $tong = $tong + $item['quantity'] * $item['price'];
        };
        include './views/client/cart.php';
    }
    public function checkWishlistStatus($user_id, $productId)
    {
        return $this->WebModel->isProductInWishlist($user_id, $productId);
    }
    public function addToCart()
    {
        if ($_GET['action'] === 'addcart') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data['product_id'])) {
                    $email = $_SESSION['email'];
                    $user_id = $_SESSION['id'];
                    $productId = $data['product_id'];
                    $size = $data['size'];
                    $quantity = $data['quantity'];
                    $existingProduct = $this->WebModel->getCartByProductAndSize($user_id, $productId, $size);
                    if ($existingProduct) {
                        $newQuantity = $existingProduct['quantity'] + $quantity;
                        $result = $this->WebModel->updateCartQuantity($user_id, $productId, $size, $newQuantity);
                    } else {
                        $result = $this->WebModel->addProductToCart($user_id, $productId, $quantity, $size);
                    }
                    if ($result) {
                        echo json_encode(['success' => true, 'message' => 'Thêm sản phẩm thành công']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Không thể thêm sản phẩm vào giỏ hàng.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Phương thức HTTP không được hỗ trợ.']);
            }
        }
    }
    public function updateQuantity()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id'], $data['delta'])) {
            $id = $data['id'];
            $delta = $data['delta'];
            $user_id = $_SESSION['id'];
            $product = $this->WebModel->getCartItemById($id, $user_id);
            $product_id = $product['product_id'];
            $size = $product['size'];
            $stock = $this->WebModel->getStockByProductIdAndSize($product_id, $size);
            $currentQuantity = $product['quantity'];
            if ($delta < 0 && $currentQuantity <= 1) {
                echo json_encode(['success' => false, 'message' => 'Số lượng không thể giảm dưới 1']);
                return;
            }
            if ($delta > 0) {
                if ($currentQuantity + $delta > $stock) {
                    $delta = $stock - $currentQuantity;
                    echo json_encode(['success' => false, 'message' => 'Số lượng sản phẩm đã đạt tối đa']);
                    return;
                }
            }
            $result = $this->WebModel->updateQuantity($user_id, $id, $delta);
            if ($result) {
                $newQuantity = $this->WebModel->getQuantity($id, $user_id);
                $totalProduct = $this->WebModel->getTotalQuantityByUserId($user_id);
                $totalPrice = $this->WebModel->getTotalPrice($user_id);
                echo json_encode([
                    'success' => true,
                    'newQuantity' => $newQuantity,
                    'price' => $product['price'],
                    'totalProduct' => $totalProduct,
                    'totalPrice' => $totalPrice,
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể cập nhật số lượng.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Thiếu dữ liệu']);
        }
    }
    public function removeProductFromCartAction()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['cart_id']) && isset($data['user_id'])) {
            $cart_id = $data['cart_id'];
            $user_id = $data['user_id'];
            $result = $this->WebModel->removeProductFromCart($cart_id, $user_id);
            if ($result) {
                $totalProduct = $this->WebModel->getTotalQuantityByUserId($user_id);
                $totalPrice = $this->WebModel->getTotalPrice($user_id);
                echo json_encode([
                    'success' => true,
                    'totalProduct' => $totalProduct,
                    'totalPrice' => $totalPrice,
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể xóa sản phẩm.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Thiếu dữ liệu']);
        }
    }
}
