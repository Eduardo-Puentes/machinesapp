<?php
//Esta código se integrará al sistema de josé, por lo que en este momento no manda información real
include 'db_connection.php';

// Obtener datos del formulario
$maquina_id = "";
$usuario_id = "";
$hora = date("Y-m-d H:i:s");
$accion = "";

// Insertar datos en la base de datos
$sql = "INSERT INTO maquina (maquina_id, usuario_id, hora, accion) VALUES ('$maquina_id', '$usuario_id', '$hora', '$accion')";

if ($conexion->query($sql) === TRUE) {
    header('Location: logs.php');
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>