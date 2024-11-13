<?php
include './models/UserModel.php';
class UserController
{
    public $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function showAll()
    {
        include "./views/client/login.php";
    }
    public function showFormReg()
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
            $xacnhanpassword = $_POST['inrepass'];
            $diachi = $_POST['inaddress'];

            // Validate password match
            if ($password !== $xacnhanpassword) {
                echo "Mật khẩu không khớp. Vui lòng nhập lại.";
                return;
            }

            if ($this->UserModel->register($ho, $ten, $email, $sodt, $ngaysinh, $gioitinh, $tinhthanh, $quanhuyen, $phuongxa, $diachi, $password)) {
                header('location: ?action=login');
                exit();
            } else {
                echo "Đăng ký không thành công. Vui lòng thử lại.";
            }
        }
    }
}
