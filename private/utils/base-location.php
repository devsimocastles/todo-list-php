<?php

session_start();

function base_location(){
    return "/todo-list-php";
}

function redirect($url, $error){
    $location = base_location();
    $_SESSION["register_error"] = $error;
    header("Location: "."$location/$url");
    exit();
};