<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$password = "";
$database = "LoginExtintoresWeb";

$conexion = new mysqli($servidor, $usuario, $password, $database);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM login_table WHERE Email='$email' AND Contraseña='$password'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Si el usuario y la contraseña son correctos, iniciar sesión
    $_SESSION['email'] = $email;
    header('Location: inicio.php');
} else {
    // Si los datos no son correctos, mostrar un mensaje de error
    echo "Correo electrónico o contraseña incorrectos";
}

$conexion->close();
?>