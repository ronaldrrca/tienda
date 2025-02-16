<?php
session_start();

if (!isset($_SESSION["id_cliente"])) {
    $_SESSION["redirect_to"] = basename($_SERVER["PHP_SELF"]); // Guarda la página actual para redireccionar nuevamente al origen.
    // Si el usuario no está autenticado, redirigirlo a la página de login
    header("Location: login-cliente.php");
    exit();
}
?>
