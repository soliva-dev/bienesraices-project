<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'c1541718samu', 'vabofoWE76', 'c1541718samu');

    //Prueba de conexion a DB
    //if($db) {
    //    echo "Se conectó";
    //} else {
    //    echo "No se conectó";
    //}

    if(!$db) {
        echo "Error al conectar con la base de datos.";
        exit;
    } 

    return $db;
}