<?php
// Verificar si se ha enviado un ID válido para borrar
if (isset($_GET['id'])) {
    // Recuperar el ID del elemento a borrar
    $id = $_GET['id'];

    // Conexión a la base de datos
    include 'db_connection.php';

    // Consulta para borrar el elemento de la base de datos
    $sql = "DELETE FROM maquina WHERE id = '$id'";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir de vuelta a la página principal después de borrar
        header('Location: machines.php');
        exit;
    } else {
        echo "Error al borrar el elemento: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "ID no válido para borrar.";
}
?>
