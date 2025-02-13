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
            <li><a class="menu-lista-item" href="login.php">Iniciar sesión</a></li>
            <li><a class="menu-lista-item" href="registro.php">Registrarse</a></li>
            <li><a class="menu-lista-item" href="admin-login.php">Admin</a></li>

        </ul>
    </nav>
</header>