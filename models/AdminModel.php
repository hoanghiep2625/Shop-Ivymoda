<?php
require_once './includes/connect_db.php';

class AdminModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Kết nối cơ sở dữ liệu sử dụng PDO
    }

    // Lấy tất cả người dùng
    public function getAllUser()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    // Lấy tất cả categories
    public function getAllCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    // Lấy categories theo id
    public function getCategoriesById($id)
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        return $category;
    }

    // Lấy subcategories theo id
    public function getSubCategoriesById($id)
    {
        $query = "SELECT * FROM subcategories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $sub_category = $stmt->fetch(PDO::FETCH_ASSOC);
        return $sub_category;
    }

    // Lấy subcategories theo parent_category_id
    public function getSubCategoriesByParentCategoryId($parent_category_id)
    {
        $query = "SELECT * FROM subcategories WHERE parent_category_id = :parent_category_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':parent_category_id', $parent_category_id);
        $stmt->execute();
        $sub_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sub_categories;
    }

    // Lấy sub_subcategories theo parent_subcategory_id
    public function getSubSubCategoriesByParentSubcategoryId($parent_subcategory_id)
    {
        $query = "SELECT * FROM sub_subcategories WHERE parent_subcategory_id = :parent_subcategory_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':parent_subcategory_id', $parent_subcategory_id);
        $stmt->execute();
        $sub_sub_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sub_sub_categories;
    }

    // Lấy sub_subcategories theo id
    public function getSubSubCategoriesById($id)
    {
        $query = "SELECT * FROM sub_subcategories WHERE parent_subcategory_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $sub_sub_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sub_sub_categories;
    }

    // Lấy thông tin người dùng cần chỉnh sửa
    public function chinh_sua_nguoi_dung($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    // Lấy tất cả sản phẩm
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
