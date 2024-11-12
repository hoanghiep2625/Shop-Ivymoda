<?php
include './includes/connect_db.php';
class UserModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
        public function register($ho, $ten, $email, $sodt, $ngaysinh, $gioitinh, $tinhthanh, $quanhuyen, $phuongxa, $diachi, $password) {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
            // Câu lệnh SQL để chèn dữ liệu vào bảng `users`
            $sql = "INSERT INTO users (ho, ten, email, sodt, ngaysinh, gioitinh, tinhthanh, quanhuyen, phuongxa, diachi, password) 
                    VALUES (:ho, :ten, :email, :sodt, :ngaysinh, :gioitinh, :tinhthanh, :quanhuyen, :phuongxa, :diachi, :password)";
        
            // Thực thi câu lệnh chuẩn bị (prepared statement) để chống SQL Injection
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ho', $ho);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sodt', $sodt);
            $stmt->bindParam(':ngaysinh', $ngaysinh);
            $stmt->bindParam(':gioitinh', $gioitinh);
            $stmt->bindParam(':tinhthanh', $tinhthanh);
            $stmt->bindParam(':quanhuyen', $quanhuyen);
            $stmt->bindParam(':phuongxa', $phuongxa);
            $stmt->bindParam(':diachi', $diachi);
            $stmt->bindParam(':password', $hashedPassword);
        
            // Kiểm tra nếu câu lệnh được thực thi thành công
            if ($stmt->execute()) {
                return true; // Trả về true nếu đăng ký thành công
            } else {
                return false; // Trả về false nếu có lỗi xảy ra
            }
        }
        public function getAllUser(){
            try{
                $sql = "SELECT * FROM users";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo "ERROR".$e->getMessage();
             
            }
        }
    }