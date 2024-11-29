<?php
require_once './includes/connect_db.php';
class UserModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function register($ho, $ten, $email, $sodt, $ngaysinh, $gioitinh, $tinhthanh, $quanhuyen, $phuongxa, $diachi, $password)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (first_name, name, email, phone, date, sex, city, district, commune, address, password, role, join_date) 
                    VALUES (:ho, :ten, :email, :sodt, :ngaysinh, :gioitinh, :tinhthanh, :quanhuyen, :phuongxa, :diachi, :password, '1',NOW())";

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

            if ($stmt->execute()) {
                return true;
            } else {
                print_r($stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function getAllUser()
    {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
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
    public function getUserByPhone($phone)
    {
        try {
            $sql = "SELECT * FROM users WHERE phone = :phone";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
            return null;
        }
    }
    public function checkEmailExists($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
            return false;
        }
    }
    public function checkPhoneExists($phone)
    {
        try {
            $sql = "SELECT * FROM users WHERE phone = :phone";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
            return false;
        }
    }
    public function getHisLoginByUserId($user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM login_history WHERE user_id = :user_id ORDER BY login_time DESC");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function changepassword($user_id, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password = :password WHERE id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }
    public function saveLoginHistory($user_id, $ipAddress, $userAgent, $device, $status)
    {
        $stmt = $this->conn->prepare("INSERT INTO login_history (user_id, ip_address, user_agent, device, status) 
                                 VALUES (:user_id, :ip_address, :user_agent, :device, :status)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':ip_address', $ipAddress);
        $stmt->bindParam(':user_agent', $userAgent);
        $stmt->bindParam(':device', $device);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }
}
