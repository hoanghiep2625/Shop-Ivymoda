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
    public function chinh_sua_nguoi_dung($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
