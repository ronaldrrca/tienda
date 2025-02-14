<?php session_start();?>
<header>
    <span id="header-nombreTienda">Mi tienda</span>
    <img onclick="abrirMenu()" id="menu-icono-menu" src="assets/imgs-site/menu-icono.svg" alt="ícono de cerra menú">
    <nav id="menu">
        <img onclick="cerrarMenu()" id="menu-icono-cerrar" src="assets/imgs-site/cerrar-menu-icono.svg" alt="ícono de cerra menú">
        <ul id="menu-lista">
            <li><a class="menu-lista-item" href="index.php">Inicio</a></li>
            <li><a class="menu-lista-item" href="productos.php">Productos</a></li>
            <li><a class="menu-lista-item" href="contacto.php">Contacto</a></li>
            <li>
                <a class="menu-lista-item" href="carrito.php">
                    <span id="item-carrito">Carrito</span>
                    <div id="menu-contenedor-carrito">
                    <img id="menu-icono-carrito" src="assets/imgs-site/carrito-icono.svg" alt="ícono carrito de compras">
                    </div>
                </a>
            </li>
            <?php if (isset($_SESSION["nombre_cliente"])) { ?><!--Verificamos si hay una sesión activa-->
                <li><a class="menu-lista-item" href="./backend/authentications/logout.php">Cerrar sesión</a></li>
                 <li>
                    <div class="tooltip">
                        <img class="user-icon" src="./assets/imgs-site/usuario-icono.svg" alt="ícono de usuario">
                        <span class="tooltip-text"><?php echo $_SESSION["nombre_cliente"]?></span>
                     </div>
                </li>
            <?php } else { ?>
                <li><a class="menu-lista-item" href="login-cliente.php">Iniciar sesión</a></li>
                <li><a class="menu-lista-item" href="registro.php">Registrarse</a></li>
            <?php } ?>
            <li><a class="menu-lista-item" href="admin-login.php">Admin</a></li>
        </ul>
    </nav>
</header>