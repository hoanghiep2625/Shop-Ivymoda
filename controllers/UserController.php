<?php
include './models/UserModel.php';
class UserController
{
    public $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function showAll(){
        include "./views/client/login.php";
    }
    public function showFormReg(){
        include "./views/client/register.php";
    }
    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $ho = $_POST['ho'];
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $sodt = $_POST['sodt'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $tinhthanh = $_POST['tinhthanh'];
            $quanhuyen = $_POST['quanhuyen'];
            $phuongxa = $_POST['phuongxa'];
            $password = $_POST['password'];
            $xacnhanpassword = $_POST['xacnhanpassword'];
            $diachi = $_POST['chuc_vu_id'];


            $listUsers = $this->UserModel->getAllUser();
            $error = [];
            if (empty($ho)) {
                $error['ho'] = "Không để trống Họ";
            }
            if (empty($ten)) {
                $error['ten'] = "Không để trống Tên";
            }
            if (empty($email)) {
                $error['email'] = "Không để trống Email";
            }
            if (empty($sodt)) {
                $error['sodt'] = "Không để trống Số Điện Thoại";
            }
            if (empty($ngaysinh)) {
                $error['ngaysinh'] = "Không để trống Ngày Sinh";
            }
            if (empty($tinhthanh)) {
                $error['tinhthanh'] = "Không để trống Tỉnh Thành ";
            }
            if (empty($ngay_sinh)) {
                $error['ngay_sinh'] = "Không để trống ngày sinh";
            }
            if ($gioitinh == 'chua_chon') {
                $error['gioitinh'] = "Bạn phải chọn giới tính";
            }
            if ($quanhuyen == 'quanhuyen') {
                $error['quanhuyen'] = "Bạn phải chọn Quận Huyện";
            }
            if ($phuongxa == 'phuongxa') {
                $error['phuongxa'] = "Bạn phải chọn Phường Xã";
            }
            if ($diachi == 'diachi') {
                $error['diachi'] = "Bạn phải chọn Địa Chỉ";
            }

            // check xác nhận nhận mật khẩu
            if ($password !== $xacnhanpassword) {
                $error['xacnhanpassword'] = "Xác nhận mật khẩu không chính xác";
            }
            foreach ($listUsers as $key => $user) {
                if ($email === $user['email']) {
                    $error['email'] = "Tài khoản đã tồn tại";
                }
            }
            if (empty($error)) { // xứ lí thêm dữ liệu vào database
                if ($this->UserModel->register($ho, $ten, $email, $sodt, $ngaysinh, $gioitinh, $tinhthanh, $quanhuyen, $phuongxa,$diachi,$password)) {

                    header('location:  ' . BASE_URL);
                    exit();
                }
            } else {
                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL . '?act=form-dang-ky');
                exit();
            }
        }
    }
}