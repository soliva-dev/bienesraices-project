<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header ('Location: /samu/BienesRaices/bienesraices_inicio/index.php');
    }

    //IMPORTAR LA CONEXION
    require 'includes/config/database.php'; //require es relativo al documento que lo esta mandando a llamar 
    $db = conectarDB();

    //ESCRIBIR EL QUERY
    $query = "SELECT * FROM propiedades WHERE id = $id";

    //CONSULTAR LA BASE DE DATOS
    $resultado = mysqli_query($db, $query);

    //REDIRECCION A INDEX
    if(!$resultado->num_rows) {
        header ('Location: /samu/BienesRaices/bienesraices_inicio/index.php');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    //INCLUYE TEMPLATES
    require 'includes/funciones.php';
    incluirTemplate('header');

?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'];?></h1>
        <img loading="lazy" src="/samu/BienesRaices/bienesraices_inicio/imagenes/<?php echo $propiedad['imagen'] . ".jpg";?>" alt="Imagen Destacada">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad['titulo'];?></p>
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
            <?php echo $propiedad['descripcion'];?>
        </div>
    </main>

<?php 
    //CERRAR LA CONEXION (OPCIONAL)
    mysqli_close($db);

    incluirTemplate('footer');
?>