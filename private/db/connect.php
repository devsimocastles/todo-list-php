<?php

try{
    $conexion = new PDO("mysql:host=localhost;dbname=todolist", "root","Ad_m1n*");
    $query = $conexion->query("select * from tarea");
} catch (PDOException $e){
    echo $e->getMessage();
}