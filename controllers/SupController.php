<?php
include './models/SupModel.php';
class YourController
{
    public $LunaModel;
    public function __construct()
    {
        $this->LunaModel = new YourModel();
    }
    public function showAll(){
        include "./views/home.php";
    }
}