<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_actas"; // Nombre de la base de datos que creaste

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>
