<?php
session_start();
require_once 'UserController.php';

// Verificar si se han enviado los datos del formulario
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear una nueva instancia del controlador de usuario
    $userController = new UserController($db);
    
    // Llamar al método de inicio de sesión del controlador
    $userController->login($username, $password);
} else {
    // Si no se han enviado los datos del formulario, redirigir al usuario de vuelta al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
