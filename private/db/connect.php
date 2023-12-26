<?php

try{
    $conexion = new PDO("mysql:host=localhost;dbname=todolist", "root","Ad_m1n*");
} catch (PDOException $e){
    echo $e->getMessage();
}