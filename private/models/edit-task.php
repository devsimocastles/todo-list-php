<?php

include ("../db/connect.php");
include ("../utils/base-location.php");

$name = $_POST["task_name"];
$desc = $_POST["task_desc"];

if ($name == "" || $desc == "") {
    $_SESSION["update_error"] = "empty_field";
    header("Location:".base_location()."/private/models/todo-handler.php?action=".$_SESSION["operation"]."&id=".$_SESSION["task_id"]);
}

$sql = "UPDATE tarea SET nombre = '$name', descripcion = '$desc' WHERE id_tarea =".$_SESSION["task_id"];

$conexion->query($sql);
header("Location:".base_location()."/todo");