<?php
// Establecer la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$database = "loginextintoresweb";

$conexion = new mysqli($servidor, $usuario, $password, $database);

if ($conexion->connect_error) {
    die("conexion fallida: " . $conexion->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS loginextintoresweb";

if ($conexion->query($sql) !== true) {
    die("error al crear la base de datos: " . $conexion->error);
}

// Crear la tabla de formulario
$sql = "CREATE TABLE IF NOT EXISTS login_table (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL, 
    NameEmpresa VARCHAR(100) NOT NULL,
    Correo VARCHAR(100) NOT NULL,
    Contraseña VARCHAR(100) NOT NULL,
    fecha TIMESTAMP
)";



if ($conexion->query($sql) !== true) {
    die("error al crear la tabla de formulario: " . $conexion->error);
}

$sql = "CREATE TABLE IF NOT EXISTS loginextintoresweb.usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL, 
    NameEmpresa VARCHAR(100) NOT NULL,
    Correo VARCHAR(100) NOT NULL,
    Contraseña VARCHAR(100) NOT NULL,
    fecha TIMESTAMP
)";



if ($conexion->query($sql) !== true) {
    die("error al crear la tabla de formulario: " . $conexion->error);
}




// Mostrar un mensaje si todo se creó correctamente
echo "Las tablas se crearon correctamente";

// Cerrar la conexión a la base de datos
$conexion->close();
?>
