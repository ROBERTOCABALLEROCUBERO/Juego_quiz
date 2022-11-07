<?php
$servername = "10.230.108.82";
$username = "root";
$password = "ASECg1PYysBg";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Quiz", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
    echo "Connection failed: " . $e->getMessage();

}