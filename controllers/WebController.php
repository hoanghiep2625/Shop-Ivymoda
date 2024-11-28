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
    public function addToViewedProducts($email, $productId)
    {
        $productExists = $this->WebModel->checkProductExists($email, $productId);

        if ($productExists) {
            return;
        }
        $viewedCount = $this->WebModel->getViewedCount($email);
        if ($viewedCount >= 6) {
            $this->WebModel->deleteOldestViewedProduct($email);
        }
        $this->WebModel->addProductViewed($email, $productId);
    }

    public function product()
    {
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;
        $email = $_SESSION['email'];
        $this->addToViewedProducts($email, $id);
        $idviewedproduct = $this->WebModel->getViewedProducts($email, $id);
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
    // Trong Controller
    public function addToWishlist()
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!isset($_SESSION['email'])) {
            echo json_encode(['success' => false]);
            exit;
        }

        $email = $_SESSION['email'];
        $productId = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;

        // Kiểm tra ID sản phẩm hợp lệ
        if ($productId && !$this->WebModel->isProductInWishlist($email, $productId)) {
            // Thêm sản phẩm vào wishlist
            $this->WebModel->addToWishlist($email, $productId);
            echo json_encode(['success' => true, 'action' => 'added']);
        } else {
            echo json_encode(['success' => false]);
        }

        exit;
    }

    public function removeFromWishlist()
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!isset($_SESSION['email'])) {
            echo json_encode(['success' => false]);
            exit;
        }

        $email = $_SESSION['email'];
        $productId = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;

        if ($productId && $this->WebModel->isProductInWishlist($email, $productId)) {
            // Xóa sản phẩm khỏi wishlist
            $this->WebModel->removeFromWishlist($email, $productId);
            echo json_encode(['success' => true, 'action' => 'removed']);
        } else {
            echo json_encode(['success' => false]);
        }

        exit;
    }
    // Hiển thị danh sách yêu thích
    public function showWishlist()
    {
        $email = $_SESSION['email'];
        $user = $this->WebModel->getUserByEmail($email);
        $wishlist = $this->WebModel->getWishlistByEmail($email);

        include './views/client/product_love.php';
    }

    public function checkWishlistStatus($email, $productId)
    {
        return $this->WebModel->isProductInWishlist($email, $productId);
    }
}
