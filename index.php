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
    default:
        echo "case not match";
}
