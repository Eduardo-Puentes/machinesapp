<?php
// Verificar si se ha enviado un ID válido para borrar
if (isset($_GET['maquina_id'], $_GET['usuario_id'], $_GET['accion'])) {
    // Recuperar datos
    $maquina_id = $_GET['maquina_id'];
    $usuario_id = $_GET['usuario_id'];
    $accion = $_GET['accion'];
    $hora = date("Y-m-d H:i:s");

    //Esta código se integrará al sistema de josé, por lo que en este momento no manda información real
    include 'db_connection.php';

    // Insertar datos en la base de datos
    $sql = "INSERT INTO logs (maquina_id, usuario_id, hora, accion) VALUES ('$maquina_id', '$usuario_id', '$hora', '$accion')";
    $sql1 = "UPDATE usuario SET activaciones = (activaciones + 1) WHERE matricula = '$usuario_id'";
    $sql2 = "UPDATE maquina SET availability = IF(availability = 0, 1, 0) WHERE id = '$maquina_id'";

    if ($conexion->query($sql) === TRUE && $conexion->query($sql1) === TRUE && $conexion->query($sql2) === TRUE) {
        header('Location: machines.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Datos no válidos.";
}
?>
