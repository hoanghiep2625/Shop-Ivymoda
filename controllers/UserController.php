<?php
require_once './models/UserModel.php';
class UserController
{
    public $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function showFormreg($thatbai = '', $ho = '', $ten = '', $email = '', $sodt = '', $ngaysinh = '', $gioitinh = '', $tinhthanh = '', $quanhuyen = '', $phuongxa = '', $password = '', $diachi = '')
    {
        include "./views/client/register.php";
    }
    public function register()
    {
        if (isset($_POST['register'])) {
            $ho = $_POST['inho'];
            $ten = $_POST['inten'];
            $email = $_POST['inemail'];
            $sodt = $_POST['inphone'];
            $ngaysinh = $_POST['indate'];
            $gioitinh = $_POST['insex'];
            $tinhthanh = $_POST['city'];
            $quanhuyen = $_POST['district'];
            $phuongxa = $_POST['ward'];
            $password = $_POST['inpassword'];
            $diachi = $_POST['inaddress'];
            $thatbai = '';
            // Kiểm tra xem email đã tồn tại chưa
            $userExists = $this->UserModel->checkEmailExists($email);
            $phoneExists = $this->UserModel->checkPhoneExists($sodt);
            if ($userExists) {
                $thatbai = 1;
                return $this->showFormreg($thatbai, $ho, $ten, $email, $sodt, $ngaysinh, $gioitinh, $tinhthanh, $quanhuyen, $phuongxa, $password, $diachi);
            } elseif ($phoneExists) {
                $thatbai = 2;
                return $this->showFormreg($thatbai, $ho, $ten, $email, $sodt, $ngaysinh, $gioitinh, $tinhthanh, $quanhuyen, $phuongxa, $password, $diachi);
            }

            if ($this->UserModel->register($ho, $ten, $email, $sodt, $ngaysinh, $gioitinh, $tinhthanh, $quanhuyen, $phuongxa, $diachi, $password)) {
                header('location: ?action=showFormlogin');
                exit();
            } else {
                echo "Đăng ký không thành công. Vui lòng thử lại.";
            }
        }
    }
    public function showFormlogin($thatbai = '', $username = '', $password = '')
    {
        include './views/client/login.php';
    }
    public function login()
    {
        if (isset($_POST['login'])) {
            $thatbai = '';
            $input = $_POST['username'];
            $password = $_POST['password'];
            if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $user = $this->UserModel->getUserByEmail($input);
            } else {
                $user = $this->UserModel->getUserByPhone($input);
            }
            if (!$user || !password_verify($password, $user['password'])) {
                $thatbai = "Tài khoản hoặc mật khẩu không chính xác";
                return $this->showFormlogin($thatbai, $input, $password);
            } else {
                $_SESSION['email'] = $user['email'];
                header('location: ?action=home');
                exit();
            }
        }
    }
}
