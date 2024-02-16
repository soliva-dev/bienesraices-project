<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>CONTÁCTANOS</h1>

        <picture>
            <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/destacada3.webp" type="image/webp">
            <source srcset="/samu/BienesRaices/bienesraices_inicio/build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="/samu/BienesRaices/bienesraices_inicio/build/img/destacada3.jpg" alt="Imagen Destacada">
        </picture>

        <h2>Llene el Formulario de Contacto</h2>

        <form class="formulario">

            <fieldset>

                <legend>Informacion Personal</legend>

                <label for="nombre">NOMBRE</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-MAIL</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="telefono">TELEFONO</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono">

                <label for="mensaje">MENSAJE</label>
                <textarea id="mensaje"></textarea>
                
            </fieldset>

            <fieldset>

                <legend>Informacion sobre la Propiedad</legend>

                <label for="opciones">VENDE O COMPRA</label>
                <select id="opciones">
                    <option value="" disabled selected> -- Seleccionar -- </option>
                    <option value="Vende">Vende</option>
                    <option value="Compra">Compra</option>
                </select>

                <label for="presupuesto">PRECIO O PRESUPUESTO</label>
                <input type="number" placeholder="Precio - Presupuesto" id="presupuesto">

            </fieldset>

            <fieldset>

                <legend>Contacto</legend>

                <p>¿CÓMO DESEA SER CONTACTADO?</p>

                <div class="forma-contacto">

                    <label for="contactar-telefono">TELEFONO</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-MAIL</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">

                </div>

                <p>SI ELIGIÓ TELEFONO, ELIJA FECHA Y HORA</p>
                
                <label for="fecha">FECHA</label>
                <input type="date" id="fecha">

                <label for="hora">HORA</label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>

    </main>

<?php 
    incluirTemplate('footer');
?>