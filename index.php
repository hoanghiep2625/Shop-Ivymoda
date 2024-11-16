<?php
require_once "./includes/help.php";
require_once "./controllers/UserController.php";
require_once "./controllers/WebController.php";


$action =  isset($_GET['action']) ? $_GET['action'] : 'home';

$userController = new UserController();
$webController = new WebController();


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
        $webController->info();
        break;
    case 'qanda':
        $webController->qanda();
        break;
    case 'huongdanmuahang':
        $webController->huongdanmuahang();
        break;
    default:
        echo "Không có trang này";
}
