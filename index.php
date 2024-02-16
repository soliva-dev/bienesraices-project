<?php 
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion"> <!--Sección principal del contenido.-->
        <h1>Más sobre nosotros</h1> <!--Título principal de la sección.-->
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/samu/BienesRaices/bienesraices_inicio/build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3> <!--Encabezado de nivel 3-->
                <p>Repudiandae nulla necessitatibus, blanditiis voluptas ipsam commodi recusandae sed qui quos doloremque inventore itaque pariatur eaque non error consequatur dolorum soluta expedita.</p><!--Parrafo-->
            </div>
            <div class="icono">
                <img src="/samu/BienesRaices/bienesraices_inicio/build/img/icono2.svg" alt="icono seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>Repudiandae nulla necessitatibus, blanditiis voluptas ipsam commodi recusandae sed qui quos doloremque inventore itaque pariatur eaque non error consequatur dolorum soluta expedita.</p>
            </div>
            <div class="icono">
                <img src="/samu/BienesRaices/bienesraices_inicio/build/img/icono3.svg" alt="icono seguridad" loading="lazy">
                <h3>A tiempo</h3>
                <p>Repudiandae nulla necessitatibus, blanditiis voluptas ipsam commodi recusandae sed qui quos doloremque inventore itaque pariatur eaque non error consequatur dolorum soluta expedita.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor"> <!-- Sección adicional del contenido.-->
        <h2>Casas y Departamentos en Venta</h2> <!--Título principal de la sección.-->

        <?php
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">VER TODAS</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Completa el formulario y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">CONTÁCTANOS</a>
    </section>

    <div class="contenedor seccion-inferior">
        <section class="blog">
            <h3>NUESTRO BLOG</h3>
    
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog1.webp" type="image/webp">
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog1.jpg" type="image/jpeg">
                        <img src="/samu/BienesRaices/bienesraices_inicio/build/img/blog1.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>
    
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>08/12/2023</span> por: <span>Admin</span> </p>
    
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y al mejor precio.</p>
                    </a>
                </div>
            </article>
    
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog2.webp" type="image/webp">
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog2.jpg" type="image/jpeg">
                        <img src="/samu/BienesRaices/bienesraices_inicio/build/img/blog2.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>
    
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>08/12/2023</span> por: <span>Admin</span> </p>
    
                        <p>Maximiza el espacio en tu hogar con esta guía, arende a combinar muebles y colores para darle vida a tu espacio.</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>El personal se comportó de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.</blockquote>
                <p> - Samuel Oliva</p>
            </div>
        </section>
    </div>

<?php 
    incluirTemplate('footer');
?>