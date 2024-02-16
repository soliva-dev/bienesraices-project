<?php

//IMPORTAR LA CONEXION
require __DIR__ . '/../config/database.php'; //require es relativo al documento que lo esta mandando a llamar 
$db = conectarDB();

//ESCRIBIR EL QUERY
$query = "SELECT * FROM propiedades LIMIT $limite";
    
//CONSULTAR LA BASE DE DATOS
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">
            <img loading="lazy" src="/samu/BienesRaices/bienesraices_inicio/imagenes/<?php echo $propiedad['imagen'] . ".jpg";?>" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo'];?></h3>
                <p><?php echo $propiedad['descripcion'];?></p>
                <p class="precio">$ <?php echo $propiedad['precio'];?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="/samu/BienesRaices/bienesraices_inicio/build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                        <p><?php echo $propiedad['wc'];?></p>
                    </li>
                    <li>
                        <img class="icono" src="/samu/BienesRaices/bienesraices_inicio/build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                        <p><?php echo $propiedad['estacionamiento'];?></p>
                    </li>
                    <li>
                        <img class="icono" src="/samu/BienesRaices/bienesraices_inicio/build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                        <p><?php echo $propiedad['habitaciones'];?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block"> VER PROPIEDAD</a>
            </div> <!-- .contenido-anuncio -->
        </div> <!-- .anuncio -->
        <?php endwhile; ?>

</div> <!-- .contenedor-anuncios -->

<?php 

    //CERRAR LA CONEXION (OPCIONAL)
    mysqli_close($db);
?>