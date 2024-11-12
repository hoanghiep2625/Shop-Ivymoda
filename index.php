<?php
include "./includes/help.php";
include "./controllers/SupController.php";

$action =  isset($_GET['action']) ? $_GET['action'] : 'home';

$yourController = new YourController();

switch ($action) {
    case 'home':
        $yourController->showAll();
        break;
    default:
        echo "case not match";
}