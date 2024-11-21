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
    public function getSubSubCategoriesByParentSubcategoryId(
        $parent_subcategory_id
    ) {
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
    public function chinh_sua_nguoi_dung($id)
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
}
