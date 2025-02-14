<?php
session_start();

if (!isset($_SESSION["id_cliente"])) {
    // Si el usuario no está autenticado, redirigirlo a la página de login
    header("Location: login-cliente.php");
    exit();
}
?>
