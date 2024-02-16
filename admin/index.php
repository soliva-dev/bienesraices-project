<?php 

    // MUESTRA INFORMACION SOLO SI $AUTH ES TRUE
    require '../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('location: /samu/BienesRaices/bienesraices_inicio/index.php');
    }

    //IMPORTAR LA CONEXION
    require '../includes/config/database.php';
    $db = conectarDB();


    //ESCRIBIR EL QUERY
    $query = "SELECT * FROM propiedades";

    
    //CONSULTAR LA BASE DE DATOS
    $resultadoConsulta = mysqli_query($db, $query);


    //MUESTRA MENSAJE CONDICIONAL
    $resultado = $_GET['resultado'] ?? null; // Si GET Resultado no existe ?? lo asigan como NULL

    //REVISAR EL REQUEST METHOD
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        //ELIMINA EL ARCHIVO
        $query = "SELECT imagen from propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('/samu/BienesRaices/bienesraices_inicio/imagenes/' . $propiedad['imagen']); //VER LA ELIMINACION DE IMAGENES, NO FUNCIONA!!!!! CORROBORAR QUE TRAIGA DATOS DE LA CARPETA IMAGENES

        //ELIMINA EL REGISTRO DE PROPIEDAD
        $query = "DELETE from propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);

        if($resultado) {
            header('location: /samu/BienesRaices/bienesraices_inicio/admin?resultado=3');
        }
    }

    //INCLUIR TEMPLATES
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>ADMINISTRADOR DE BIENES RAICES</h1>

        <?php if( intval ( $resultado ) === 1 ): ?> <!-- intval convierte un valor en entero -->
            <p class="alerta exito">Anuncio Registrado Correctamente</p>
        <?php elseif( intval ( $resultado ) === 2 ): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif( intval ( $resultado ) === 3 ): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif; ?>

        <a href="/samu/BienesRaices/bienesraices_inicio/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- MOSTRAR LOS RESULTADOS -->
                <?php while( $propiedad = mysqli_fetch_assoc( $resultadoConsulta ) ): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/samu/BienesRaices/bienesraices_inicio/imagenes/<?php echo $propiedad['imagen'] . ".jpg"; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/samu/BienesRaices/bienesraices_inicio/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block" >Actualizar</a>
                </td>
                </tr>
                <?php endwhile;?>
            </tbody>

        </table>

    </main>

<?php 

    //CERRAR LA CONEXION (OPCIONAL)
    mysqli_close($db);

    incluirTemplate('footer');
?>