<?php
require './backend/users/gestion-usuarios-back.php'; // Conectar a la base de datos
?>
<div id="contenedor-formulario-usuario" style="display: none;">
    <h2>Agregar Usuario</h2>
    <form id="formAgregarUsuario">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">

        <div id="passwords">
            <div class="password-container">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password">
                <button type="button" id="togglePassword">👁️</button>
            </div>
            <div class="password-container">
                <label for="confirm_password">Confirmar Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <button type="button" id="togglePasswordRepetir">👁️</button>
            </div>
        </div>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="admin">Admin</option>
            <option value="vendedor">Vendedor</option>
        </select>
        <div id="botones-formularioUsuario">
            <button type="submit">Agregar Usuario</button>
            <button type="button" onclick="cancelarFormularioUsuario()">Cancelar</button>
        </div>
        <span id="error-message"></span>
    </form>
</div>

<div id="contenedor-tablaUsuarios">
    <h2>Usuarios</h2>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['id_usuario']?></td>
            <td><?php echo $fila['nombre_usuario']?></td>
            <td><?php echo $fila['usuario_usuario']?></td>
            <td><?php echo $fila['rol_usuario']?></td>
            <td>
                <button onclick="eliminarUsuario(<?php echo $fila['id_usuario']; ?>, '<?php echo addslashes($fila['nombre_usuario']); ?>')">Eliminar</button>
                <button onclick="editarUsuario(<?php echo $fila['id_usuario']; ?>, '<?php echo addslashes($fila['nombre_usuario']); ?>')">Editar</button>
            </td>
        </tr>
        <?php } ?>
    </table>
        </div>
<button onclick="mostrarFormularioUsuario()">Nuevo usuario</button>

    

