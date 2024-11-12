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
        include "./views/client/home.php";
    }
}