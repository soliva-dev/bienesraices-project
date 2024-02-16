<?php

    session_start();

    $_SESSION = [];

    header('location: /samu/BienesRaices/bienesraices_inicio/index.php');

// if($_SESSION === []) {
//     header('location: /samu/BienesRaices/bienesraices_inicio/index.php');
// }
