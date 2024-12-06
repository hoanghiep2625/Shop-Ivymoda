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
    public function getHoverProductImage($id)
    {
        $sql = "SELECT image_url FROM product_images WHERE product_id = ? AND is_main = 2";
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
    public function getAllCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getViewedCount($user_id)
    {
        $query = "SELECT COUNT(*) FROM viewed_products WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchColumn();
    }
    public function checkProductExists($user_id, $productId)
    {
        $query = "SELECT COUNT(*) FROM viewed_products WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id, ':product_id' => $productId]);
        return $stmt->fetchColumn() > 0;
    }
    public function getViewedProducts($user_id, $id)
    {
        $query = "SELECT * FROM viewed_products WHERE user_id = :user_id AND product_id != :id ORDER BY viewed_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':user_id' => $user_id,
            ':id' => $id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteOldestViewedProduct($user_id)
    {
        $deleteQuery = "DELETE FROM viewed_products WHERE user_id = :user_id ORDER BY viewed_at ASC LIMIT 1";
        $deleteStmt = $this->conn->prepare($deleteQuery);
        $deleteStmt->execute([':user_id' => $user_id]);
    }
    public function addProductViewed($user_id, $productId)
    {
        $insertQuery = "INSERT INTO viewed_products (user_id, product_id) VALUES (:user_id, :product_id)";
        $insertStmt = $this->conn->prepare($insertQuery);
        $insertStmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $productId
        ]);
    }
    public function isProductInWishlist($user_id, $productId)
    {
        $query = "SELECT COUNT(*) FROM wishlist WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $productId
        ]);
        return $stmt->fetchColumn() > 0;
    }

    public function addToWishlist($user_id, $productId)
    {
        $query = "INSERT INTO wishlist (user_id, product_id) VALUES (:user_id, :product_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $productId
        ]);
    }
    public function removeFromWishlist($user_id, $productId)
    {
        $query = "DELETE FROM wishlist WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $productId
        ]);
    }
    public function getWishlistByUserId($user_id)
    {
        $query = "SELECT p.* FROM products p
              JOIN wishlist w ON p.id = w.product_id
              WHERE w.user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createOrder($user_id, $total_price, $total_product, $shipping_address, $cart)
    {
        try {
            $this->conn->beginTransaction();

            // Chèn đơn hàng vào bảng orders
            $queryOrder = "INSERT INTO orders (user_id, total_price, total_product, shipping_address) 
                           VALUES (:user_id, :total_price, :total_product, :shipping_address)";
            $stmtOrder = $this->conn->prepare($queryOrder);
            $stmtOrder->execute([
                ':user_id' => $user_id,
                ':total_price' => $total_price,
                ':total_product' => $total_product,
                ':shipping_address' => $shipping_address
            ]);
            $order_id = $this->conn->lastInsertId();
            foreach ($cart as $item) {
                $queryDetail = "INSERT INTO order_details (order_id, product_id, size, quantity, price) 
                                VALUES (:order_id, :product_id, :size, :quantity, :price)";
                $stmtDetail = $this->conn->prepare($queryDetail);
                $stmtDetail->execute([
                    ':order_id' => $order_id,
                    ':product_id' => $item['id'],
                    ':size' => $item['size'],
                    ':quantity' => $item['quantity'],
                    ':price' => $item['price']
                ]);
            }
            $deleteCartQuery = "DELETE FROM cart WHERE user_id = :user_id";
            $stmtDeleteCart = $this->conn->prepare($deleteCartQuery);
            $stmtDeleteCart->execute([':user_id' => $user_id]);

            $this->conn->commit();

            return ['success' => true, 'order_id' => $order_id];
        } catch (Exception $e) {
            $this->conn->rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    public function getOrdersByUserId($user_id)
    {
        $query = "SELECT order_id, user_id, total_price, order_date, status, shipping_address 
              FROM orders WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function getOrdersById($id)
    {
        $query = "SELECT * FROM orders WHERE order_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserByUserId($user_id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
            return null;
        }
    }
    public function addProductToCart($user_id, $productId, $quantity, $size)
    {
        $stmt = $this->conn->prepare("INSERT INTO cart (user_id, product_id, quantity, size) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $productId, $quantity, $size]);
    }
    public function getTotalQuantityByUserId($user_id)
    {
        $query = "SELECT SUM(quantity) AS total_quantity FROM cart WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_quantity'] ?? 0;
    }
    public function getTotalCartByUserId($user_id)
    {
        $query = "SELECT SUM(quantity) AS total_quantity FROM cart WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_quantity'] ?? 0;
    }
    public function getAllCartByUserId($user_id)
    {
        $query = "
        SELECT p.id, p.name, p.price, c.quantity, c.cart_id, c.size, c.created_at
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = :user_id
        ORDER BY c.created_at DESC
    ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCartByUserId($user_id)
    {
        $query = "SELECT * FROM cart WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCartByProductAndSize($user_id, $productId, $size)
    {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id AND size = :size";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':size', $size);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateCartQuantity($user_id, $productId, $size, $newQuantity)
    {
        $sql = "UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id AND size = :size";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':quantity', $newQuantity);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':size', $size);
        return $stmt->execute();
    }
    public function updateQuantity($user_id, $id, $soluongtanggiam)
    {
        $sql = "UPDATE cart SET quantity = quantity + :soluongtanggiam WHERE cart_id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':soluongtanggiam', $soluongtanggiam);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $affectedRows = $stmt->rowCount();
        if ($affectedRows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getQuantity($id, $user_id)
    {
        $sql = "SELECT quantity FROM cart WHERE cart_id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['quantity'] : 0;
    }
    public function getStockByProductIdAndSize($product_id, $size)
    {
        $sql = "SELECT stock FROM product_variants WHERE product_id = :product_id AND size = :size";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':size', $size);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['stock'] : 0;
    }
    public function removeProductFromCart($cart_id, $user_id)
    {
        $sql = "DELETE FROM cart WHERE cart_id = :cart_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cart_id', $cart_id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
    public function getCartItemById($id, $user_id)
    {
        $query = "
        SELECT 
            p.id AS product_id, 
            p.name AS product_name, 
            p.price, 
            c.quantity, 
            c.cart_id, 
            c.size, 
            c.created_at
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.cart_id = :cart_id AND c.user_id = :user_id
        LIMIT 1
    ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cart_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getTotalPrice($user_id)
    {
        $query = "
        SELECT SUM(c.quantity * p.price) AS total_price
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = :user_id
    ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_price'] ?? 0;
    }
    public function getCartById($cart_id, $user_id)
    {
        $query = " SELECT * FROM cart WHERE cart_id = :cart_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getStock($product_id, $size)
    {
        $query = "
        SELECT stock
        FROM product_variants
        WHERE product_id = :product_id AND size = :size
    ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':size', $size, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['stock'] ?? 0;
    }
    public function getFilteredSizeProducts($filters)
    {
        $sizeArray = isset($filters) && is_array($filters) ? $filters : [];
        $conditions = ["pv.stock > 0"];
        if (!empty($sizeArray)) {
            $sizePlaceholders = implode(',', array_fill(0, count($sizeArray), '?'));
            $conditions[] = "pv.size IN ($sizePlaceholders)";
        }
        $whereClause = implode(' AND ', $conditions);
        $sql = "
        SELECT p.id, p.name, p.color, p.sku_code, p.price, COUNT(DISTINCT pv.size) AS matching_sizes
        FROM products p
        INNER JOIN product_variants pv ON p.id = pv.product_id
        WHERE $whereClause
    ";
        if (!empty($sizeArray)) {
            $sql .= " GROUP BY p.id, p.name, p.color HAVING matching_sizes = ?";
        } else {
            $sql .= " GROUP BY p.id, p.name, p.color";
        }
        $params = [];
        if (!empty($sizeArray)) {
            $params = array_merge($params, $sizeArray);
            $params[] = count($sizeArray);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFilteredColorProducts($productFilterSize, $filterColor)
    {
        // Giữ lại các sản phẩm đã lọc theo kích thước
        $productFilterSizeArray = $productFilterSize;

        // Nếu không có màu sắc nào được chọn, trả về kết quả đã lọc theo kích thước
        if (empty($filterColor)) {
            return $productFilterSizeArray;
        }

        // Lọc thêm theo màu sắc
        $filteredProducts = array_filter($productFilterSizeArray, function ($product) use ($filterColor) {
            return in_array($product['color'], $filterColor);
        });

        // Trả về sản phẩm sau khi lọc theo màu sắc
        return array_values($filteredProducts);
    }
    public function getFilteredPriceProducts($productFilterColor, $minPrice, $maxPrice)
    {
        // Giữ lại các sản phẩm đã lọc theo màu sắc
        $productFilterColorArray = $productFilterColor;

        // Nếu không có giá tối thiểu hoặc tối đa, trả về tất cả các sản phẩm
        if (empty($minPrice) && empty($maxPrice)) {
            return $productFilterColorArray;
        }

        // Lọc sản phẩm có giá nằm trong khoảng minPrice và maxPrice
        $filteredProducts = array_filter($productFilterColorArray, function ($product) use ($minPrice, $maxPrice) {
            // Kiểm tra nếu sản phẩm có giá nằm trong khoảng
            $productPrice = $product['price'];
            return ($productPrice >= $minPrice && $productPrice <= $maxPrice);
        });

        // Trả về danh sách sản phẩm sau khi lọc theo giá
        return array_values($filteredProducts);
    }
}
