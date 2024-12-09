<?php
require_once './models/AdminModel.php';
class AdminController
{
    public $AdminModel;
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }
    public function checkUser()
    {
        if ($_SESSION['admin'] == null) {
            header('location: ?action=home');
            return;
        }
    }
    public function thongke()
    {
        $from_date = isset($_POST['from_date']) ? $_POST['from_date'] : null;
        $to_date = isset($_POST['to_date']) ? $_POST['to_date'] : null;

        if ($from_date && $to_date) {
            $locdoanhthu = $this->AdminModel->getDoanhThuTuNgayDenNgay($from_date, $to_date);
        } else {
            $locdoanhthu = $this->AdminModel->getDoanhThuTT();
        }
        $total_orders_xuly = $this->AdminModel->total_orders_xuly();
        $total_orders_dahuy = $this->AdminModel->total_orders_dahuy();
        $total_orders_hoanthanh = $this->AdminModel->total_orders_hoanthanh();
        $today_revenue = $this->AdminModel->getTodayRevenue();
        $monthly_revenue = $this->AdminModel->getMonthlyRevenue();
        $year_revenue = $this->AdminModel->getYearRevenue();
        $total_orders = $this->AdminModel->getCountOrders();
        $total_users = $this->AdminModel->getCountUsers();
        $soluongsanpham = $this->AdminModel->getCountStock();
        $doanhthu = $this->AdminModel->getDoanhThu();

        $doanhthutt = $this->AdminModel->getDoanhThuTT();
        $today_revenuett = $this->AdminModel->getTodayRevenueTT();
        $monthly_revenuett = $this->AdminModel->getMonthlyRevenueTT();
        $year_revenuett = $this->AdminModel->getYearRevenuTT();

        include "./views/admin/thongke.php";
    }

    public function quan_ly_nguoi_dung()
    {
        $users = $this->AdminModel->getAllUser();
        include "./views/admin/users.php";
    }
    public function loadLocationData()
    {
        $json_file = 'includes/json/data.json';
        if (file_exists($json_file)) {
            $json_data = file_get_contents($json_file);
            return json_decode($json_data, true);
        } else {
            die("File dữ liệu không tồn tại.");
        }
    }

    public function chinh_sua_nguoi_dung()
    {
        $id = $_GET['id'];
        $user = $this->AdminModel->getUserById($id);

        $data = $this->loadLocationData();
        $city_id = htmlspecialchars($user['city']);
        $district_id = htmlspecialchars($user['district']);
        $commune_id = htmlspecialchars($user['commune']);

        $city_name = $this->getCityNameById($city_id, $data);
        $district_name = $this->getDistrictNameById($city_id, $district_id, $data);
        $commune_name = $this->getCommuneNameById($city_id, $district_id, $commune_id, $data);

        include "./views/admin/edit_user.php";
    }

    public function getCityNameById($id, $data)
    {
        foreach ($data as $city) {
            if ($city['Id'] == $id) {
                return $city['Name'];
            }
        }
        return null;
    }
    public function getDistrictNameById($cityId, $districtId, $data)
    {
        foreach ($data as $city) {
            if ($city['Id'] == $cityId) {
                foreach ($city['Districts'] as $district) {
                    if ($district['Id'] == $districtId) {
                        return $district['Name'];
                    }
                }
            }
        }
        return null;
    }
    public function getCommuneNameById($cityId, $districtId, $communeId, $data)
    {
        foreach ($data as $city) {
            if ($city['Id'] == $cityId) {
                foreach ($city['Districts'] as $district) {
                    if ($district['Id'] == $districtId) {
                        foreach ($district['Wards'] as $commune) {
                            if ($commune['Id'] == $communeId) {
                                return $commune['Name'];
                            }
                        }
                    }
                }
            }
        }
        return null;
    }
    public function quan_ly_danh_muc()
    {
        $categories = $this->AdminModel->getAllCategories();
        include "./views/admin/categories.php";
    }
    public function nhanh_con_categories()
    {
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : null;
        $categories = $this->AdminModel->getCategoriesById($id);
        $categorie['id'] = $_GET['id'];
        $sub_categories = $this->AdminModel->getSubCategoriesByParentCategoryId($id);
        include "./views/admin/sub_categories.php";
    }
    public function orders()
    {
        $orders = $this->AdminModel->getAllOrders();
        include "./views/admin/orders.php";
    }
    public function view_order()
    {
        $order_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : null;
        $order = $this->AdminModel->getOrderById($order_id);
        $user = $this->AdminModel->getUserById($order['user_id']);
        $data = $this->loadLocationData();
        $city_id = htmlspecialchars($user['city']);
        $district_id = htmlspecialchars($user['district']);
        $commune_id = htmlspecialchars($user['commune']);
        $city_name = $this->getCityNameById($city_id, $data);
        $district_name = $this->getDistrictNameById($city_id, $district_id, $data);
        $commune_name = $this->getCommuneNameById($city_id, $district_id, $commune_id, $data);
        $orderDetails = $this->AdminModel->getOrderDetailsByOrderId($order_id);
        include "./views/admin/view_order.php";
    }
    public function editStatusOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status']) && isset($_POST['order_id'])) {
            $status = $_POST['status'];
            $orderId = $_POST['order_id'];
            $isUpdated = $this->AdminModel->updateOrderStatus($orderId, $status);
            if ($isUpdated) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể cập nhật trạng thái']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
        }
    }
    public function nhanh_con_con_categories()
    {
        $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : null;
        $category = $_GET['category'];
        $categorie = $this->AdminModel->getCategoriesById($category);
        $sub_category = $this->AdminModel->getSubCategoriesById($id);
        $sub_sub_categories = $this->AdminModel->getSubSubCategoriesByParentSubcategoryId($id);
        include "./views/admin/sub_sub_categories.php";
    }
    public function products()
    {
        $products = $this->AdminModel->getAllProduct();
        include "./views/admin/products.php";
    }
    public function add_product()
    {
        $categories = $this->AdminModel->getAllCategories();
        $categoriesData = $this->AdminModel->getCategoriesWithSubcategories();
        $categoriesDataJson = json_encode($categoriesData);
        include "./views/admin/add_product.php";
    }
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            if (strlen($_POST['sku_code']) > 1) {
                $sku_code = $_POST['sku_code'];
            } else {
                $sku_code =
                    rand(10, 99) . chr(rand(65, 90)) . rand(1000, 9999);
            }
            $short_description = $_POST['short_description'];
            $full_description = $_POST['full_description'];
            $sub_subcategory_id = $_POST['sub_subcategory_id'];
            $color = $_POST['colorgoc'];
            $colorchuan = $_POST['hex_value'];
            $namecolor = $_POST['name_color'];
            $productId = $this->AdminModel->addProduct($name, $price, $sku_code, $short_description, $full_description, $sub_subcategory_id, $color, $colorchuan, $namecolor);

            if (!$productId) {
                die("Không thể thêm sản phẩm.");
            }

            $variants = [];
            foreach ($_POST['stock'] as $colorIndex => $stockData) {
                foreach ($stockData as $size => $stock) {
                    $variants[] = ['size' => $size, 'stock' => $stock];
                }
            }

            if (!empty($variants)) {
                $this->AdminModel->addProductVariants($productId, $variants);
            }
            $subimages = [];
            if (!empty($_FILES['sub_images']['name'][0])) {
                foreach ($_FILES['sub_images']['name'] as $index => $filename) {
                    $imagePath = "./public/imageSp/" . basename($filename);
                    move_uploaded_file($_FILES['sub_images']['tmp_name'][$index], $imagePath);

                    // Gán is_main cho 2 ảnh đầu tiên
                    $isMain = ($index === 0) ? 1 : (($index === 1) ? 2 : 0);

                    $subimages[] = [
                        'url' => $imagePath,
                        'is_main' => $isMain,
                    ];
                }
                $this->AdminModel->addProductImages($productId, $subimages);
            }
            header("Location: /products?success=true");
            exit();
        }
    }

    private function uploadImages($main_images, $sub_images)
    {
        $uploadDir = 'uploads/';
        $imagePaths = [
            'main_images' => [],
            'sub_images' => [],
        ];

        foreach ($main_images['name'] as $index => $fileName) {
            $filePath = $uploadDir . basename($fileName);
            if (move_uploaded_file($main_images['tmp_name'][$index], $filePath)) {
                $imagePaths['main_images'][] = $filePath;
            }
        }

        foreach ($sub_images['name'] as $index => $fileName) {
            $filePath = $uploadDir . basename($fileName);
            if (move_uploaded_file($sub_images['tmp_name'][$index], $filePath)) {
                $imagePaths['sub_images'][] = $filePath;
            }
        }

        return $imagePaths;
    }
    public function add_color()
    {
        $id = $_GET['id'];
        $product = $this->AdminModel->getProductById($id);
        $sub_subcategories = $this->AdminModel->getParentSubcategoryId($product['sub_subcategory_id']);
        $subcategories = $this->AdminModel->getParentCategoryId($sub_subcategories['parent_subcategory_id']);
        $categories = $this->AdminModel->getCategoriesById($subcategories['id']);
        include "./views/admin/add_color.php";
    }
}
