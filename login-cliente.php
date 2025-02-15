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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!--Estilos css-->
    <link rel="stylesheet" href="./frontend/css/mobile-styles.css" media="screen and (min-width: 360px)">
    <link rel="stylesheet" href="./frontend/css/tablet-styles.css" media="screen and (min-width: 768px)">
    <link rel="stylesheet" href="./frontend/css/desktop-styles.css" media="screen and (min-width: 1300px)">
</head>
<body>
    <?php include './frontend/includes-front/header.php'?>
    <main id="main-login">
        <h1>Inicio de sesión</h1>
        <form id="formulario-login-cliente" METHOD="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email">
            <div class="password-container">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Contraseña">
                <button type="button" id="togglePassword">👁️</button>
                <div id="resultado-login" ></div>
            </div>
            <input type="submit" value="Ingresar">
        </form>
        
        <a id="login-registrarse" href="./registro.php">Registrarse</a>
    </main>
    <?php include './frontend/includes-front/footer.php'?>
    <script src="frontend/js/header.js"></script>
    <script src="frontend/js/login-cliente.js"></script>
</body>
</html>