<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "TC2005B_602_04"; // Usuario por defecto de MySQL en XAMPP
$password = "vFc5vv*4P3Q="; // Sin contraseña por defecto en XAMPP
$dbname = "TC2005B_602_04"; // Nombre de la base de datos que creaste


// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];
$date = date("Y-m-d H:i:s");

// Insertar datos en la base de datos
$sql = "INSERT INTO usuario (matricula, nombre, fecha_inscripcion, carrera, activaciones, estado) VALUES ('$matricula', '$nombre', '$date',  '$carrera', '0', '1')";

if ($conexion->query($sql) === TRUE) {
    header('Location: users.php');
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>