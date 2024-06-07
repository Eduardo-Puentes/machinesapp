<?php
include 'db_connection.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$matricula = $_POST['matricula'];
$carrera = $_POST['carrera'];
$date = date("Y-m-d H:i:s");

// Insertar datos en la base de datos
$sql = "INSERT INTO usuario (matricula, nombre, fecha_inscripcion, carrera, activaciones, estado) VALUES ('$matricula', '$nombre', '$date',  '$carrera', '0', '1')";
$sql1 = "INSERT INTO usuariohistory (matricula, nombre, fecha_inscripcion, carrera, activaciones, estado) VALUES ('$matricula', '$nombre', '$date',  '$carrera', '0', '1')";

if ($conexion->query($sql) === TRUE) {
    header('Location: users.php');
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>