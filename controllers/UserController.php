<?php
include './models/UserModel.php';
class YourController
{
    public $UserModel;
    public function __construct()
    {
        $this->UserModel = new YourModel();
    }
    public function showAll(){
        include "./views/home.php";
    }
}