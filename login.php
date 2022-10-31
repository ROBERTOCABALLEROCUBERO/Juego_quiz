<?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];
    session_start();
    if ($_POST['Registro'] === true) {
        $consulta = $conn->query("SELECT usuario FROM usuario WHERE usuario = $nombre");
        if ($conn->exec($consulta) == 0) {
            $conn->query("INSERT INTO usuarios(...) VALUES ($nombre, $pass)");
            $_SESSION["Creada"] = "Se ha registrado correctamente";
            header("Location: info.php");
        } else {
            $_SESSION["Creada"] = "No se ha podido registrar";
            header("Location: info.php");
        }
    }

    if ($_POST["Login"] === true) {

        $sql = $conn->query("SELECT * FROM usuario WHERE usuario = $nombre and pass= $pass");
        if ($conn->exec($sql) == 0) {
            $_SESSION["Creada"] = "No has podido iniciar sesion";
            header("Location: info.html");
        } else {
            header("Location: ");
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


