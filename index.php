<?php
include "./includes/help.php";
include "./controllers/UserController.php";

$action =  isset($_GET['action']) ? $_GET['action'] : 'home';

$userController = new UserController();

switch ($action) {
    case 'home':
        $userController->showAll();
        break;
    default:
        echo "case not match";
}