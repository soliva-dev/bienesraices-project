<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">

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

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog3.webp" type="image/webp">
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog3.jpg" type="image/jpeg">
                        <img src="/samu/BienesRaices/bienesraices_inicio/build/img/blog3.jpg" alt="Texto Entrada Blog" loading="lazy">
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

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog4.webp" type="image/webp">
                        <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/blog4.jpg" type="image/jpeg">
                        <img src="/samu/BienesRaices/bienesraices_inicio/build/img/blog4.jpg" alt="Texto Entrada Blog" loading="lazy">
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

    </main>

<?php 
    incluirTemplate('footer');
?>