<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>SOBRE NOSOTROS</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/nosotros.webp" type="image/webp">
                    <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="/samu/BienesRaices/bienesraices_inicio/build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            
            <div class="texto-nosotros">
                <blockquote>
                    25 AÑOS DE EXPERIENCIA
                </blockquote>

               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi velit vel fugit laborum obcaecati libero esse mollitia nam dolor dolorem enim consequuntur, veritatis eligendi nihil ex atque ratione neque ducimus? Lorem ipsum dolor nam dolor dolorem enim consequuntur, veritatis eligendi nihil ex atque ratione neque ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

               <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id corrupti sit ab veritatis voluptatum optio fugit necessitatibus adipisci dolores ipsa, labore illum repellendus doloremque vero voluptatibus nulla perferendis, voluptatem iusto? illum repellendus doloremque vero voluptatibus nulla perferendis, voluptatem iusto?.</p>

            </div>
    </main>

    <section class="contenedor seccion"> <!--Sección principal del contenido.-->
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
    </section>

<?php 
    incluirTemplate('footer');
?>