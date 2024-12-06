<?php
require_once './includes/connect_db.php';

class AdminModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllUser()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function updateOrderStatus($orderId, $status)
    {
        $validStatuses = ['pending', 'processing', 'completed', 'cancelled'];
        if (!in_array($status, $validStatuses)) {
            return false;
        }
        $query = "UPDATE orders SET status = :status WHERE order_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $orderId);
        return $stmt->execute();
    }
    public function getAllCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getCategoriesById($id)
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        return $category;
    }
    public function getSubCategoriesById($id)
    {
        $query = "SELECT * FROM subcategories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $sub_category = $stmt->fetch(PDO::FETCH_ASSOC);
        return $sub_category;
    }
    public function getSubCategoriesByParentCategoryId($parent_category_id)
    {
        $query = "SELECT * FROM subcategories WHERE parent_category_id = :parent_category_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':parent_category_id', $parent_category_id);
        $stmt->execute();
        $sub_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sub_categories;
    }
    public function getSubSubCategoriesByParentSubcategoryId($parent_subcategory_id)
    {
        $query = "SELECT * FROM sub_subcategories WHERE parent_subcategory_id = :parent_subcategory_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':parent_subcategory_id', $parent_subcategory_id);
        $stmt->execute();
        $sub_sub_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sub_sub_categories;
    }
    public function getSubSubCategoriesById($id)
    {
        $query = "SELECT * FROM sub_subcategories WHERE parent_subcategory_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $sub_sub_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sub_sub_categories;
    }
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getAllProduct()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getCategoriesWithSubcategories()
    {
        $sql = "
            SELECT
                c.id AS category_id,
                c.name AS category_name,
                s.id AS subcategory_id,
                s.name AS subcategory_name,
                ss.id AS sub_subcategory_id,
                ss.name AS sub_subcategory_name
            FROM
                categories c
            LEFT JOIN
                subcategories s ON c.id = s.parent_category_id
            LEFT JOIN
                sub_subcategories ss ON s.id = ss.parent_subcategory_id
            ORDER BY
                c.id, s.id, ss.id
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getCountStock()
    {
        $sql = "SELECT SUM(stock) AS total FROM product_variants";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
    public function getYearRevenue()
    {
        $currentYear = date('Y'); // Lấy năm hiện tại
        $sql = "SELECT SUM(total_price) AS total 
            FROM orders 
            WHERE YEAR(order_date) = :year";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':year', $currentYear, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function getMonthlyRevenue()
    {
        $currentYear = date('Y'); // Lấy năm hiện tại
        $currentMonth = date('m'); // Lấy tháng hiện tại
        $sql = "SELECT SUM(total_price) AS total 
            FROM orders 
            WHERE YEAR(order_date) = :year AND MONTH(order_date) = :month";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':year', $currentYear, PDO::PARAM_INT);
        $stmt->bindParam(':month', $currentMonth, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
    public function total_orders_xuly()
    {
        $sql = "SELECT COUNT(*) AS total FROM orders WHERE status = 'pending'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
    public function total_orders_dahuy()
    {
        $sql = "SELECT COUNT(*) AS total FROM orders WHERE status = 'cancelled'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
    public function total_orders_hoanthanh()
    {
        $sql = "SELECT COUNT(*) AS total FROM orders WHERE status = 'completed'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
    public function getTodayRevenue()
    {
        $currentDate = date('Y-m-d'); // Lấy ngày hiện tại
        $sql = "SELECT SUM(total_price) AS total 
            FROM orders 
            WHERE DATE(order_date) = :date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':date', $currentDate);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }


    public function getDoanhThu()
    {
        $sql = "SELECT SUM(total_price) AS total FROM orders";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
    public function getCountUsers()
    {
        $sql = "SELECT COUNT(*) AS total_users FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_users'] ?? 0;
    }
    public function getCountOrders()
    {
        $sql = "SELECT COUNT(*) AS total_orders FROM orders";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_orders'] ?? 0;
    }

    public function addProduct($name, $price, $sku_code, $short_description, $full_description, $sub_subcategory_id, $color, $colorchuan, $name_color)
    {
        $sql = "INSERT INTO products (name, price, sku_code, short_description, full_description, sub_subcategory_id, color, hex_color, name_color, time_add) 
            VALUES (:name, :price, :sku_code, :short_description, :full_description, :sub_subcategory_id, :color, :colorchuan, :name_color, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':sku_code' => $sku_code,
            ':short_description' => $short_description,
            ':full_description' => $full_description,
            ':sub_subcategory_id' => $sub_subcategory_id,
            ':color' => $color,
            ':colorchuan' => $colorchuan,
            ':name_color' => $name_color
        ]);

        // Lấy ID vừa thêm
        return $this->conn->lastInsertId();
    }
    public function getOrderById($id)
    {
        $sql = "SELECT * FROM orders WHERE order_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getMainProductImage($id)
    {
        $sql = "SELECT image_url FROM product_images WHERE product_id = ? AND is_main = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['image_url'] : null;
    }
    public function getOrderDetailsByOrderId($order_id)
    {
        $query = "SELECT od.detail_id, od.order_id, od.product_id, od.size, od.quantity, od.price, p.name AS product_name, p.id AS product_id
              FROM order_details od
              JOIN products p ON od.product_id = p.id
              WHERE od.order_id = :order_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':order_id' => $order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllOrders()
    {
        $sql = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // Thêm hình ảnh sản phẩm
    public function addProductImages($productId, $images)
    {
        $sql = "INSERT INTO product_images (product_id, image_url, is_main) VALUES (:product_id, :image_url, :is_main)";
        $stmt = $this->conn->prepare($sql);
        foreach ($images as $image) {
            $stmt->execute([
                ':product_id' => $productId,
                ':image_url' => $image['url'],
                ':is_main' => $image['is_main'],
            ]);
        }
    }

    // Thêm biến thể sản phẩm
    public function addProductVariants($productId, $variants)
    {
        $sql = "INSERT INTO product_variants (product_id, size, stock) VALUES (:product_id, :size, :stock)";
        $stmt = $this->conn->prepare($sql);
        foreach ($variants as $variant) {
            $stmt->execute([
                ':product_id' => $productId,
                ':size' => $variant['size'],
                ':stock' => $variant['stock'],
            ]);
        }
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getParentSubcategoryId($id)
    {
        $sql = "SELECT * FROM sub_subcategories WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    public function getParentCategoryId($id)
    {
        $sql = "SELECT * FROM subcategories WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }
}
