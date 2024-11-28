<?php
require_once './includes/connect_db.php';
class WebModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function get5spnew()
    {
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get5spfall()
    {
        $sql = "SELECT * FROM products ORDER BY id ASC LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMainProductImage($id)
    {
        $sql = "SELECT image_url FROM product_images WHERE product_id = ? AND is_main = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['image_url'] : null;
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductImage($id)
    {
        $sql = "SELECT image_url FROM product_images WHERE product_id = ? ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSubSubSategoriesById($id)
    {
        $sql = "SELECT name FROM sub_subcategories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getSizeProductByProductId($product_id)
    {
        $sql = "SELECT * FROM product_variants WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductTuongTuBySubSubSategories($sub_subcategory_id, $product_id, $colorgoc)
    {
        $sql = "SELECT * FROM products WHERE sub_subcategory_id = ? AND id != ? AND color = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$sub_subcategory_id, $product_id, $colorgoc]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllColorBySku($sku, $id)
    {
        $sql = "SELECT * FROM products WHERE sku_code = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$sku]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getViewedCount($email)
    {
        $query = "SELECT COUNT(*) FROM viewed_products WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchColumn();
    }
    public function checkProductExists($email, $productId)
    {
        $query = "SELECT COUNT(*) FROM viewed_products WHERE email = :email AND product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email, ':product_id' => $productId]);
        return $stmt->fetchColumn() > 0;
    }
    public function getViewedProducts($email, $id)
    {
        $query = "SELECT * FROM viewed_products WHERE email = :email AND product_id != :id ORDER BY viewed_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':id' => $id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteOldestViewedProduct($email)
    {
        $deleteQuery = "DELETE FROM viewed_products WHERE email = :email ORDER BY viewed_at ASC LIMIT 1";
        $deleteStmt = $this->conn->prepare($deleteQuery);
        $deleteStmt->execute([':email' => $email]);
    }
    public function addProductViewed($email, $productId)
    {
        $insertQuery = "INSERT INTO viewed_products (email, product_id) VALUES (:email, :product_id)";
        $insertStmt = $this->conn->prepare($insertQuery);
        $insertStmt->execute([
            ':email' => $email,
            ':product_id' => $productId
        ]);
    }
    public function isProductInWishlist($email, $productId)
    {
        $query = "SELECT COUNT(*) FROM wishlist WHERE email = :email AND product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':product_id' => $productId
        ]);
        return $stmt->fetchColumn() > 0;
    }

    // Thêm sản phẩm vào danh sách yêu thích
    public function addToWishlist($email, $productId)
    {
        $query = "INSERT INTO wishlist (email, product_id) VALUES (:email, :product_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':product_id' => $productId
        ]);
    }

    // Xóa sản phẩm khỏi danh sách yêu thích
    public function removeFromWishlist($email, $productId)
    {
        $query = "DELETE FROM wishlist WHERE email = :email AND product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':product_id' => $productId
        ]);
    }

    // Lấy danh sách sản phẩm yêu thích của người dùng
    public function getWishlistByEmail($email)
    {
        $query = "SELECT p.* FROM products p
                  JOIN wishlist w ON p.id = w.product_id
                  WHERE w.email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserByEmail($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
            return null;
        }
    }
}
