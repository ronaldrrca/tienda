<?php
session_start();
if (!isset($_SESSION['rol_usuario'])) {
    header('Location: login-admin.php');
    exit();
}
$rol = $_SESSION['rol_usuario'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <!--Facebook y otras redes.-->
    <meta property="og:title" content="Tu Tienda Online - Encuentra lo Mejor">
    <meta property="og:description" content="Explora nuestra tienda y disfruta de grandes ofertas y envíos rápidos. ¡Compra ahora!">
    <meta property="og:image" content="URL_de_la_imagen_destacada">
    <meta property="og:url" content="https://www.tutienda.com">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <!--Para Compartir en Twitter/X-->
    <meta name="twitter:title" content="Tu Tienda Online - Encuentra lo Mejor">
    <meta name="twitter:description" content="Explora nuestra tienda y disfruta de grandes ofertas y envíos rápidos. ¡Compra ahora!">
    <meta name="twitter:image" content="URL_de_la_imagen_destacada">
    <link rel="canonical" href="https://www.tutienda.com/pagina-principal">
    <meta name="description" content="Descubre los mejores productos al mejor precio. Envíos rápidos, ofertas exclusivas y una experiencia de compra fácil y segura. ¡Compra ahora!">
    <title>Tu Tienda Online | Productos de Calidad al Mejor Precio</title>
    <link rel="shortcut icon" href="./assets/imgs-site/favicon.ico" type="image/x-icon">
    <!--Estilos css-->
    <link rel="stylesheet" href="./frontend/css/mobile-styles.css" media="screen and (min-width: 360px)">
    <link rel="stylesheet" href="./frontend/css/tablet-styles.css" media="screen and (min-width: 768px)">
    <link rel="stylesheet" href="./frontend/css/desktop-styles.css" media="screen and (min-width: 1300px)">
</head>
<body>
    <header id="header-admin-panel">
        <a class="header-nombreTienda" href="./index.php">Mi tienda</a>
        <div class="usuario-info">
            <img src="./assets/imgs-site/usuario-icono.svg" alt="ícono de usuario">
            <span><?php echo htmlspecialchars($_SESSION['admin']); ?></span>
        </div>
        <h1>Panel de Gestión</h1>
        <a id="header-adminPanel-cerrarsesion" href="./backend/authentications/logout.php">Cerrar sesión</a>
        <div class="gestiones">
            <button onclick="cargarSeccion('gestion-usuarios.php')">Usuarios</button>
            <button onclick="cargarSeccion('gestion-productos.php')">Productos</button>
        </div>
    </header>

    <main id="main-adminPanel">
        
        <section id="contenido-usuarios"></section>
    
   
        
    </main>
    <?php include './frontend/includes-front/footer.php'?>
    <script src="frontend/js/index.js"></script>
    <script src="frontend/js/admin-panel.js"></script>
    
</body>
</html>