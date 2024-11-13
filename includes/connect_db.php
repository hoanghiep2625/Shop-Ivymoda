<?php
function connectDB()
{
    $servername = "localhost";
    $username = "duan1";
    $password = "duan1";
    $myDB = "shopivymoda";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
