<?php
require_once './includes/connect_db.php';
class WebModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
}
