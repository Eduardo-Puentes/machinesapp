<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Usuario por defecto de MySQL en XAMPP
$password = ""; // Sin contraseña por defecto en XAMPP
$dbname = "maquina"; // Nombre de la base de datos que creaste

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$urlimagen = $_POST['urlimagen'];
$ubicacion = $_POST['ubicacion'];
$date = date("Y-m-d H:i:s");

// Insertar datos en la base de datos
$sql = "INSERT INTO maquina (name, image, on_time, off_time, ubication, availability) VALUES ('$nombre', '$urlimagen', '$date', '$date',  '$ubicacion', '0')";

if ($conexion->query($sql) === TRUE) {
    header('Location: machines.php');
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>