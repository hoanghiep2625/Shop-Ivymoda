<?php
include './includes/connect_db.php';
class YourModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
}