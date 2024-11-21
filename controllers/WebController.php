<?php
include './models/WebModel.php';
class WebController
{
    public $WebModel;
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }
    public function showFormlogin()
    {
        include "./views/client/login.php";
    }
    public function trangchu()
    {
        include "./views/client/home.php";
    }
    public function showFormreg()
    {
        include "./views/client/register.php";
    }
    public function product()
    {
        include "./views/client/product.php";
    }
    public function dieukhoan()
    {
        include "./views/client/chinh-sach-dieu-khoan.php";
    }
    public function info()
    {
        include "./views/client/info.php";
    }
    public function qanda()
    {
        include "./views/client/q&a.php";
    }
    public function huongdanmuahang()
    {
        include "./views/client/huong-dan-mua-hang.php";
    }
    public function chinhsachthanhtoan()
    {
        include "./views/client/chinh-sach-thanh-toan.php";
    }
    public function chinhsachdoitra()
    {
        include "./views/client/chinh-sach-doi-tra.php";
    }
    public function chinhsachbaohanh()
    {
        include "./views/client/chinh-sach-bao-hanh.php";
    }
    public function chinhsachvanchuyen()
    {
        include "./views/client/chinh-sach-giao-hang-van-chuyen.php";
    }
    public function chinhsachthethanhvien()
    {
        include "./views/client/chinh-sach-the-thanh-vien.php";
    }
}
