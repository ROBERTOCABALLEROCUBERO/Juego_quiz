<?php
$servername = "localhos";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Quiz", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
    echo "Connection failed: " . $e->getMessage();

}