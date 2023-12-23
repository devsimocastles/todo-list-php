<?php

// include ("./private/utils/base-location.php");


function redirect($url, $error){
    $base_location = base_location();
    header("Location: "."$url"."?"."error=$error");
    exit();
};