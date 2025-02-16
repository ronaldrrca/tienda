<?php
require './backend/conexion.php'; // Conectar a la base de datos

$query = "SELECT id_usuario, nombre_usuario, usuario_usuario, rol_usuario FROM usuarios where 1";
$resultado = $conexion->query($query);
$conexion->close();

?>