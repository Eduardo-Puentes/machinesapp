<?php
include 'db_connection.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$urlimagen = $_POST['urlimagen'];
$ubicacion = $_POST['ubicacion'];
$date = date("Y-m-d H:i:s");

// Insertar datos en la base de datos
$sql = "INSERT INTO maquina (name, image, on_time, off_time, ubication, availability) VALUES ('$nombre', '$urlimagen', '$date', '$date',  '$ubicacion', '0')";
if ($conexion->query($sql) === TRUE) {
    $id = $conexion->query("SELECT LAST_INSERT_ID() as id");
    while ($row = $id->fetch_assoc()) {
        $sql1 = "INSERT INTO maquinahistory (id, name, image, on_time, off_time, ubication, availability) VALUES (" . $row['id'] . ", '$nombre', '$urlimagen', '$date', '$date',  '$ubicacion', '0')";
        if ($conexion->query($sql1) === TRUE) {
            header('Location: machines.php');
        }
        echo $row['id'];
    }
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>