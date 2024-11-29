<?php
session_start();
function connectDB()
{
    $servername = "localhost";
    $username = "duan1";
    $password = "duan1";
    $myDB = "shopivymoda";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$myDB;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}
