<?php
require_once "./controllers/UserController.php";
require_once "./controllers/WebController.php";
require_once "./controllers/AdminController.php";

$action =  isset($_GET['action']) ? $_GET['action'] : 'home';

$userController = new UserController();
$webController = new WebController();
$adminController = new AdminController();

switch ($action) {
    case 'home':
        $webController->trangchu();
        break;
    case 'showFormreg':
        $webController->showFormreg();
        break;
    case 'register':
        $userController->register();
        break;
    case 'showFormlogin':
        $webController->showFormlogin();
        break;
    case 'login':
        $userController->login();
        break;
    case 'chinhsachdoitra':
        $webController->chinhsachdoitra();
        break;
    case 'chinhsachdoitra':
        $webController->chinhsachdoitra();
        break;
    case 'product':
        $webController->product();
        break;
    case 'dieukhoan':
        $webController->dieukhoan();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'info':
        $userController->info();
        break;
    case 'hislogin':
        $userController->hislogin();
        break;
    case 'removeFromWishlist':
        $webController->removeFromWishlist();
        break;
    case 'product-love':
        $webController->showWishlist();
        break;
    case 'addToWishlist':
        $webController->addToWishlist();
        break;
    case 'qanda':
        $webController->qanda();
        break;
    case 'changepassword':
        $userController->changepassword();
        break;
    case 'huongdanmuahang':
        $webController->huongdanmuahang();
        break;
    case 'chinhsachthanhtoan':
        $webController->chinhsachthanhtoan();
        break;
    case 'chinhsachdoitra':
        $webController->chinhsachdoitra();
        break;
    case 'chinhsachbaohanh':
        $webController->chinhsachbaohanh();
        break;
    case 'chinhsachvanchuyen':
        $webController->chinhsachvanchuyen();
        break;
    case 'forgotpassword':
        $webController->forgotpassword();
        break;
    case 'chinhsachthethanhvien':
        $webController->chinhsachthethanhvien();
        break;
    case 'thongke':
        $adminController->checkUser();
        $adminController->thongke();
        break;
    case 'quan_ly_nguoi_dung':
        $adminController->checkUser();
        $adminController->quan_ly_nguoi_dung();
        break;
    case 'chinh_sua_nguoi_dung':
        $adminController->checkUser();
        $adminController->chinh_sua_nguoi_dung();
        break;
    case 'quan_ly_danh_muc':
        $adminController->checkUser();
        $adminController->quan_ly_danh_muc();
        break;
    case 'nhanh_con_categories':
        $adminController->checkUser();
        $adminController->nhanh_con_categories();
        break;
    case 'nhanh_con_con_categories':
        $adminController->checkUser();
        $adminController->nhanh_con_con_categories();
        break;
    case 'products':
        $adminController->checkUser();
        $adminController->products();
        break;
    case 'add_product':
        $adminController->checkUser();
        $adminController->add_product();
        break;
    case 'addProduct':
        $adminController->checkUser();
        $adminController->addProduct();
        break;
    case 'add_color':
        $adminController->checkUser();
        $adminController->add_color();
        break;
    default:
        $webController->trangchu();
}
