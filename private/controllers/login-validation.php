<?php

session_start();

require "../db/connect.php";
require "../utils/base-location.php";

$user = htmlspecialchars($_POST["user"]); $pass = htmlspecialchars($_POST["pass"]);

// Chequear si usuario existe
$checkIfUserExists="SELECT nombre, clave FROM usuario where nombre = '$user' LIMIT 1";

$userExist = $conexion->query($checkIfUserExists)->fetch(PDO::FETCH_ASSOC);

if ($user == "" || $pass == "") redirect_login("/login","empty_field");

if ($userExist) {

    if ($pass != $userExist["clave"]) {
        redirect_login("/login", "wrong_password");
    } 

    $_SESSION["login_error"] = null;
    // $_SESSION["user_id"] = ;
    $_SESSION["logged"] = TRUE;
    header("Location:".base_location()."/todo");
    exit();
} else {
    $_SESSION["login_error"]="user_dont_exists";
    header("Location:".base_location()."/login");
    exit();
}
