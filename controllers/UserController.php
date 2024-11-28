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
                if ($user['role'] == 3) {
                    $_SESSION['admin'] = $user['email'];
                }
                $this->saveLoginHistory($user['email']);
                $_SESSION['email'] = $user['email'];
                header('location: ?action=home');
                exit();
            }
        }
    }
    public function logout()
    {
        if (isset($_SESSION['email'])) {
            session_destroy();
            header("location:?action=showFormlogin");
        }
    }
    public function info($thatbai = '', $newpassword = '', $thanhcong = '')
    {
        $email = $_SESSION['email'];
        $user = $this->UserModel->getUserByEmail($email);
        include "./views/client/info.php";
    }
    public function changepassword()
    {
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $email = $_SESSION['email'];

        $thatbai = '';
        $thanhcong = '';

        $user = $this->UserModel->getUserByEmail($email);

        if (!password_verify($oldpassword, $user['password'])) {
            $thatbai = "Mật khẩu cũ không chính xác.";
            return $this->info($thatbai, $newpassword, $thanhcong = '');
        }

        $this->UserModel->changepassword($email, $newpassword);
        $thanhcong = "Đổi mật khẩu thành công";
        return $this->info($thatbai = '', $newpassword = '', $thanhcong);
    }
    public function hislogin()
    {
        $email = $_SESSION['email'];
        $user = $this->UserModel->getUserByEmail($email);
        $hislogin = $this->UserModel->getHisLoginByEmail($email);
        include "./views/client/hislogin.php";
    }
    public function saveLoginHistory($email)
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $device = $this->getDeviceInfo($userAgent);
        $status = 'Success';
        $this->UserModel->saveLoginHistory($email, $ipAddress, $userAgent, $device, $status);
    }
    public function getDeviceInfo($userAgent)
    {
        if (strpos($userAgent, 'Windows NT') !== false) {
            return 'Windows';
        } elseif (strpos($userAgent, 'Macintosh') !== false) {
            return 'Mac OS';
        } elseif (strpos($userAgent, 'Android') !== false) {
            return 'Android';
        } elseif (strpos($userAgent, 'iPhone') !== false) {
            return 'iPhone';
        } else {
            return 'Unknown Device';
        }
    }
}
