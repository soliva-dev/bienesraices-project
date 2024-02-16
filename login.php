<?php 
   
    // IMPORTAR LA CONEXION
    require 'includes/config/database.php';
    $db = conectarDB();

    //INSTANCIA DE ERRORES
    $errores = [];

    // AUTENTICAR AL USUARIO
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = mysqli_real_escape_string( $db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );

        if(!$email) {
            $errores [] = "Email Obligatorio o Invalido";
        }

        if(!$password) {
            $errores [] = "Password Obligatorio o Invalido";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        if(empty($errores)) {
            // REVISAR SI EXISTE EL USUARIO
            $query = "SELECT * FROM usuarios WHERE email = '$email' ";
            $resultado = mysqli_query($db, $query);

            if($resultado->num_rows) {
                $usuario = mysqli_fetch_assoc($resultado);

                // VALIDAR QUE EL PASS SEA CORRECTO
                $auth = password_verify($password, $usuario['password']);

                if($auth) {
                    // USUARIO AUTENTICADO
                    session_start();

                    // LLENAR EL ARREGLO DE LA SESION
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('location: /samu/BienesRaices/bienesraices_inicio/admin');

                } else {
                    $errores [] = "Password Invalido";
                }

            } else {
                $errores [] = "Usuario Invalido";
            }

        }

    }

   // INCLUYE EL HEADER
   require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>INICIAR SESION</h1>

        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
            <fieldset>

                <legend>Acceder</legend>

                <label for="email">E-MAIL o USUARIO</label>
                <input type="email" name="email" placeholder="Tu Email" id="email">

                <label for="password">PASSWORD</label>
                <input type="password" name="password" placeholder="Tu Password" id="password">

            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">

        </form>

    </main>

<?php 

    // CERRAR LA CONEXION
    mysqli_close($db);
    // INCLUYE EL FOOTER
    incluirTemplate('footer');
?>