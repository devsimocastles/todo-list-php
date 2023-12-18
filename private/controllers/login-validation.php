<?php

session_start();

require "../db/connect.php";
require "../utils/base-location.php";

$user = htmlspecialchars($_POST["user"]); $pass = htmlspecialchars($_POST["pass"]);

// Chequear si usuario existe
$checkIfUserExists="SELECT nombre, clave FROM usuario where nombre = '$user' LIMIT 1";

$userExist = $conexion->query($checkIfUserExists)->fetch(PDO::FETCH_ASSOC);

print_r($userExist);
if ($userExist) {
    if ($pass != $userExist["clave"]) {
        $_SESSION["error"]="wrong_password";
        header("Location: ".base_location()."/login");
        exit();
    } 
    $_SESSION["logged"] = TRUE;
    header("Location:".base_location()."/todo");
} 
