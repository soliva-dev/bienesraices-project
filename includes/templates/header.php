<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html> <!--Declaración del tipo de documento, indica que el documento es un HTML5.-->

<html lang="en"><!--Inicio del documento HTML, con especificación del idioma inglés.-->

<head> <!--Contiene metadatos, como la codificación de caracteres, la vista del dispositivo y el título de la página.-->
    <meta charset="UTF-8"> <!--Define la codificación de caracteres como UTF-8.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Configura la visualización en dispositivos móviles.-->
    <title>BIENES RAICES</title> <!--Título de la página que se mostrará en la pestaña del navegador.-->
    <link rel="stylesheet" href="/samu/BienesRaices/bienesraices_inicio/build/css/app.css"> <!--Enlaza la hoja de estilos CSS externa.-->
</head>

<body> <!--Contiene el contenido principal de la página.-->
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>"> <!--Sección de encabezado.-->
        <div class="contenedor contenido-header"> <!--div se utiliza como un contenedor genérico para agrupar y estructurar otros elementos-->
            <div class="barra">
                <a href="/samu/BienesRaices/bienesraices_inicio/index.php"> <!--Enlace al inicio.-->
                    <img src="/samu/BienesRaices/bienesraices_inicio/build/img/logo.svg" alt="logotipo de bienes raices"> <!--Imagen del logotipo.-->
                </a>

                <div class="mobile-menu">
                    <img src="/samu/BienesRaices/bienesraices_inicio/build/img/barras.svg" alt="Icono Menu Responsive">

                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/samu/BienesRaices/bienesraices_inicio/build/img/dark-mode.svg" alt="dark mode">
                    <nav class="navegacion"> <!--Barra de navegación con enlaces.-->
                        <a href="nosotros.php">NOSOTROS</a> <!--Enlaces.-->
                        <a href="anuncios.php">ANUNCIOS</a>
                        <a href="blog.php">BLOG</a>
                        <a href="contacto.php">CONTACTO</a>
                        <?php if (!$auth) : ?>
                            <a href="login.php">- LOGIN -</a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                            <a href="logout.php">- LOGOUT -</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div> <!-- . barra -->

            <?php if($inicio) { ?>
                <h1>Venta de Casas y Departamentos Explusivos de Lujo</h1> <!--Título principal del encabezado.-->
            <?php } ?>    
        </div> <!-- . contenedor -->
    </header>