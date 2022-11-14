<?php
$servername = "localhost";
$username = "root";
$password = "";
error_reporting(0);
try {
    $conn = new PDO("mysql:host=$servername;dbname=Quiz", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
//Creo la conexión y hago que no se muestren los errores notice y warning.
