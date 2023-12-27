<?php 

include ("../db/connect.php");
include ("../utils/base-location.php");
include ("../templates/templates.php");


$operation = $_GET["action"]; $id = $_GET["id"];



if ($operation == "d") {
    $delete = "DELETE FROM tarea WHERE id_tarea = '$id'";
    $query = $conexion->query($delete);
    if ($query) header("Location:".base_location()."/todo");
}

if ($operation == "u") {
    mostrarHeader("Editar Tarea | ToDo App","task-editor");
?>
    <h1>Editar Tarea</h1>
<?php 
    mostrarFooter();
}
?>