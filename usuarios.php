<?php

// IMPORTAR LA CONEXION
require 'includes/config/database.php';
$db = conectarDB();

// CREAR UN EMAIL Y PASSWORD_BCRYPT
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// QUERY PARA CREAR EL USUARIO
$query = "INSERT INTO usuarios (email, password) VALUES ( '$email', '$passwordHash' )";

//echo $query;

// AGREGARLO A LA BASE DE DATOS
mysqli_query($db, $query);

