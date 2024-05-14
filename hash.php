<?php
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

$sql = "SELECT id, username, password FROM users";
$result = $conexion->query($sql);

// Loop through each user
while ($row = $result->fetch_assoc()) {
    $hashed_password = password_hash($row['password'], PASSWORD_DEFAULT);
    
    // Update the user's password with the hashed version
    $update_sql = "UPDATE users SET password = '$hashed_password' WHERE id = " . $row['id'];
    $conexion->query($update_sql);
}
?>