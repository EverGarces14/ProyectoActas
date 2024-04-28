<?php
session_start();
require_once 'Conexion.php';

// Verificar si el usuario ya está autenticado, en ese caso redirigir a la página de inicio
if (isset($_SESSION['Usuario'])) {
    header("Location: Inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="container">
        <h1>Iniciar sesión</h1>
        <form action="login_process.php" method="POST">
            <label>Usuario</label>
            <input type="text" name="Usuario" placeholder="Nombre de usuario" required><br>
            <label>Clave</label>
            <input type="password" name="Clave" placeholder="Clave" required><br>
            <button type="submit">Iniciar sesión</button>
        </form>
        <?php 
        if (isset($_GET['error'])) {
        ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php    
        }
        ?>
    </div>
</body>
</html>
