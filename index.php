<?php

// importando funcion que devuelve locacion base
require "./private/utils/base-location.php";

// inicio la sesión para comprobar las variables
session_start();

//ubicación url de la petición
$location = $_SERVER["REQUEST_URI"];
// metodo http de la petición
$method = $_SERVER["REQUEST_METHOD"];


//url base del proyecto local
$base_location = base_location();

//configurando rutas
if ($location == $base_location."/login" && $method == "GET") {
   header("Location: $base_location/private/views/login.php");
   exit();
}

elseif ($location == $base_location."/register" && $method == "GET"){
    header("Location: $base_location/private/views/register.php");
    exit();
}


elseif ($location == $base_location."/todo" && $method == "GET") {
    header("Location: $base_location/private/views/todo.php");
    exit();
} 

elseif ($location == $base_location."/logout" && $method == "GET") {
    header("Location: $base_location/private/utils/logout.php");
    exit();
}


// redirigir a login si el usuario no está logueado
if (!isset($_SESSION["logged"]) && $_SESSION["logged"] != TRUE) {
    header("Location: $base_location/login");
} else {
 // de lo contrario redirige a la pagina de To Do's
header("Location: $base_location/todo");
}



