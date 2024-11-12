<?php
include "./includes/help.php";
include "./controllers/UserController.php";

$action =  isset($_GET['action']) ? $_GET['action'] : 'home';

$userController = new UserController();

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
    default:
        echo "case not match";
}