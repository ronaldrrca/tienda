<!DOCTYPE html>
<html lang="es">
<head>
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
</head>
<body>
    <?php include './frontend/includes-front/header.php'; ?>
    <main id="main-registro">
        <h1>Regístrate en Nuestra Tienda</h1>
        <form id="formulario-registro-cliente" action="./backend/clients/registro-back.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" required>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>

            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="teléfono" placeholder="Teléfono (opcional)">

            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="dirección" placeholder="Dirección para envíos" required>

            <div id="passwords">
                <div class="password-container">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                    <button type="button" id="togglePassword">👁️</button>
                </div>
                <div class="password-container">
                    <label for="password_repetir">Repita la contraseña</label>
                    <input type="password" name="password_repetir" id="password_repetir" placeholder="Repita la contraseña" required>
                    <button type="button" id="togglePasswordRepetir">👁️</button>
                </div>
            </div>

            <p id="mensaje-error" style="color: red; display: none;"></p>

            <input type="submit" value="Registrarse">
        </form>
    </main>
    <?php include './frontend/includes-front/footer.php'; ?>
    <script src="frontend/js/registro.js"></script>
</body>
</html>
