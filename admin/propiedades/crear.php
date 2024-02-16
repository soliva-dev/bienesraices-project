<?php 

    // MUESTRA INFORMACION SOLO SI $AUTH ES TRUE
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('location: /samu/BienesRaices/bienesraices_inicio/index.php');
    }
    
    //BASE DE DATOS
    require '../../includes/config/database.php';
    $db = conectarDB();
    //var_dump($db);

    //SUPER GLOBALES
    //$_SERVER
    // echo "<pre>";
    // var_dump($_SERVER['REQUEST_METHOD']); // Muestra informacion del servidor
    // echo "</pre>";

    //$_GET
    // echo "<pre>";
    // var_dump($_GET); // Muestra informacion dentro de la URL
    // echo "</pre>";

    //$_POST
    // echo "<pre>";
    // var_dump($_POST); // Guarda datos en la db
    // echo "</pre>";

    //CONSULTA PARA OBTENER LOS VENDEDORES
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //ARREGLO CON MENSAJES DE ERROR
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    //SERVER METHORD EJECUTA EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORM
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //SANITIZAR Y VALIDAR EL CODIGO
        // $numero = "correo@correo.com//";
        // $numero2 = 2;

        // //SANITIZAR EL CODIGO
        // $resultado = filter_var($numero, FILTER_SANITIZE_EMAIL);
        // $resultado = filter_var($numero, FILTER_VALIDATE_INT);

        // var_dump($resultado);

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        //SANITIZAR EL CODIGO:
        //mysqli_real_escape_string escapa caracteres de una cadena antes de enviarla a la base de datos. Es útil para prevenir ataques de inyección de SQL al manipular cadenas de texto que serán utilizadas en consultas SQL. Escapa estos caracteres especiales agregando barras invertidas antes de ellos. Esto incluye caracteres como comillas simples ('), comillas dobles ("), barras invertidas (\), entre otros. Al hacer esto, se asegura de que estos caracteres sean tratados simplemente como datos y no como parte de la sintaxis SQL.
    
        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y/m/d');

        //ASIGNAR UNA VARIABLE A LA IMAGEN
        $imagen = $_FILES['imagen'];

        //var_dump($imagen);

        //exit;

        //VALIDACION DE FORM
        if(!$titulo) {
            $errores[] = 'El titulo es obligatorio';
        }

        if(!$precio) {
            $errores[] = 'El precio es obligatorio';
        }

        if( strlen($descripcion) < 50 ) {
            $errores[] = 'La descripcion es obligatoria y debe tener al menos 50 caracteres';
        }

        if(!$habitaciones) {
            $errores[] = 'El numero de habitaciones es obligatorio';
        }

        if(!$wc) {
            $errores[] = 'El numero de baños es obligatorio';
        }

        if(!$estacionamiento) {
            $errores[] = 'El numero de estacionamientos es obligatorio';
        }

        if(!$vendedorId) {
            $errores[] = 'Selecciona un vendedor';
        }

        if(!$imagen['name'] || $imagen['error']) {
            $errores[] = 'Seleccionar una imagen es obligatorio';
        }

        //VALIDAR POR TAMAÑO DE IMAGEN (1MB MAX)
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida) {
            $errores[] = 'La imagen es muy pesada';
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
        if( empty( $errores ) ) {

            //SUBIR ARCHIVOS A LA BASE DE DATOS
            //CREAR UNA CARPETA
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) { // is_dir sirve para saber si un archivo existe en el directorio
                mkdir($carpetaImagenes); // mkdir sirve para crear un directorio
            } 

            //GENERAR UN NOMBRE UNICO A LA IMAGEN
            $nombreImagen = md5( uniqid( rand(), true ) );

            //SUBIR IMAGEN A LA CARPETA CREADA
            move_uploaded_file( $imagen['tmp_name'], $carpetaImagenes . $nombreImagen . ".jpg");

            //INSERTAR EN LA BASE DE DATOS - SE DEBE EJECUTAR DE FORMA CONDICIONAL
            $query = " INSERT INTO propiedades ( titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId ) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId' ) ";

            //echo $query; //Prueba

            $resultado = mysqli_query($db, $query);
 
            if($resultado) {

                //REDIRECCIONAR AL USUARIO PARA EVITAR DATOS DUPLICADOS
                header('Location: /samu/BienesRaices/bienesraices_inicio/admin?resultado=1'); // El header funciona siempre y cuando no haya HTML previo a esta linea.

                //echo "Insertado correctamente";
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>CREAR REGISTRO DE PROPIEDAD</h1>

        <a href="/samu/BienesRaices/bienesraices_inicio/admin" class="boton boton-verde">Volver</a>

        <?php foreach( $errores as $error ) : ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/samu/BienesRaices/bienesraices_inicio/admin/propiedades/crear.php" enctype="multipart/form-data">

        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">TITULO:</label>
            <input name="titulo" type="text" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">PRECIO:</label>
            <input name="precio" type="number" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">IMAGEN:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">DESCRIPCION:</label>
            <textarea name="descripcion" id="descripcion"> <?php echo $descripcion; ?> </textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">HABITACIONES:</label>
            <input name="habitaciones" type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">BAÑOS:</label>
            <input name="wc" type="number" id="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">ESTACIONAMIENTO:</label>
            <input name="estacionamiento" type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>"> 

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="vendedor">
                <option value="" disabled selected> -- Seleccionar -- </option>
                <?php while( $vendedor = mysqli_fetch_assoc($resultado) ): ?>
                        <option  <?php echo $vendedorId === $vendedor ['id'] ? 'selected' : '' ; ?>  value=" <?php echo $vendedor ['id']; ?> "> <?php echo $vendedor ['nombre'] . " " . $vendedor ['apellido']; ?> </option>
                <?php endwhile; ?>
            </select>

        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>