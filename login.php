<?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];

    if ($_POST['Registro'] === true) {
        $consulta = $conn->query("SELECT usuario FROM usuario WHERE usuario = $nombre");
        if($conn->exec($consulta) == 0){
        $conn->query("INSERT INTO usuarios(...) VALUES ($nombre, $pass)");
        header("Location: index.html");
        }else{
        header("Location: index.html");
        }
    }

    if ($_POST["Login"] === true) {

        $sql = $conn->query("SELECT * FROM usuario WHERE usuario = $nombre and pass= $pass");
        if ($conn->exec($sql) == 0) {
            header("Location:");
        }else{
        header("Location: ");
        }
    }
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
