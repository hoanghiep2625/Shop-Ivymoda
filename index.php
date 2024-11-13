<?php
include "./includes/help.php";
include "./controllers/UserController.php";
include "./controllers/WebController.php";


$action =  isset($_GET['action']) ? $_GET['action'] : 'home';

$userController = new UserController();
$webController = new WebController();


switch ($action) {
    case 'home':
        $userController->showAll();
        break;
    case 'showformreg':
        $userController->showFormReg();
        break;
    case 'register':
        $userController->register();
        break;
    case 'chinhsachdoitra':
        $webController->chinhsachdoitra();
        break;
    default:
        echo "case not match";
}
