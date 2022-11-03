<?php
$servername = "10.230.108.82";
$username = "root";
$password = "ASECg1PYysBg";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Quiz", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $name = $_POST["nombre"];
    $pass = $_POST["pass"];
    session_start();
    if (isset($_POST['Registro'])) {
       $consulta = $conn->query("SELECT nombre FROM Usuarios WHERE nombre = '$name'"); 
     if ($consulta -> rowCount() == 0) { 
            $conn->query("INSERT INTO Usuarios (nombre, contrasena) VALUES ('$name', '$pass')");
            $_SESSION["Creada"] = "Se ha registrado correctamente";
            header("Location: info.php");
      } else { 
             $_SESSION["Creada"] = "No se ha podido registrar"; 
      header("Location: info.php"); 
         } 
    }

    if (isset($_POST["Login"])) {

        $sql = $conn->query("SELECT * FROM Usuarios WHERE nombre = '$name' and contrasena = '$pass'");

        if ($sql -> rowCount() == 0) {
            $_SESSION["Creada"] = "No has podido iniciar sesion";
            header("Location: info.php");
        } else {
            $_SESSION["User"] = $name;
            header("Location: menu.php");
        }
    } 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>


