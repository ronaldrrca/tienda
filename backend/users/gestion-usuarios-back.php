<?php
session_start();
require './backend/conexion.php'; // Conectar a la base de datos

$query = "";

if ($_SESSION['rol_usuario'] === 'superAdmin') {
    $query = "CALL verUsuarios()";
} else if ($_SESSION['rol_usuario'] === 'admin') {
    $query = "CALL verUsuariosVendedores()";
}

$resultado = $conexion->query($query);
$conexion->close();

?>