<?php
include './models/WebModel.php';
class WebController
{
    public $WebModel;
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }
    public function chinhsachdoitra()
    {
        include "./views/client/chinh-sach-doi-tra.php";
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
}
