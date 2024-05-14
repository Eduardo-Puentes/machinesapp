<?php
session_start();
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
$user = $_POST['user'];
$password = $_POST['password'];

// Consulta para obtener los datos del usuario
$sql = "SELECT id, username, password FROM users WHERE username = '$user' and password = '$password'";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
    // Contraseña correcta, iniciar sesión
    $_SESSION["username"] = $user;
    
    // Redirigir al usuario a la página de usuarios
    header('Location: index.php');
    exit;
} else {
    // Contraseña incorrecta
    echo "Contraseña incorrecta.";
}

// Cerrar la conexión
$conexion->close();
?>
