<?php
include 'db_connection.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicacion'];
$estado = $_POST['estado'];

// Insertar datos en la base de datos
$sql = "INSERT INTO maquinas (nombre, ubicacion, estado) VALUES ('$nombre', '$ubicacion', '$estado')";

if ($conexion->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>