<?php 

include ("../db/connect.php");
include ("../utils/base-location.php");
include ("../utils/print-error.php");
include ("../templates/templates.php");


$operation = $_GET["action"]; $id = $_GET["id"];

$_SESSION["operation"] = $operation;
$_SESSION["task_id"] = $id; 

if ($operation == "d") {
    $delete = "DELETE FROM tarea WHERE id_tarea = '$id'";
    $query = $conexion->query($delete);
    if ($query) header("Location:".base_location()."/todo");
}

if ($operation == "u") {
    mostrarHeader("Editar Tarea | ToDo App","task-editor");

    $user_id = $_SESSION["user_id"];
    $get_task_data = "SELECT * FROM tarea WHERE id_usuario = '$user_id'";

    $task_data = $conexion->query($get_task_data)->fetch(PDO::FETCH_ASSOC);

?>
    <h1>Editar Tarea</h1>

    <form action="edit-task.php" method="post">
        <label >Nombre tarea
            <input type="text" name="task_name" value="<?= $task_data["nombre"]?>">
        </label>
        <label>Descripción de la Tarea
            <textarea name="task_desc" cols="30" rows="10">
                <?= $task_data["descripcion"]?>
            </textarea>
        </label>
        <?php 
            echo "<div>";
            if (isset($_SESSION["update_error"]) && $_SESSION["update_error"] == "empty_field") {
                print_error("Ninguno de los campos puede estar vacío.");
            }
            echo "</div>";
        ?>
    <input type="submit" value="Editar Tarea!">
    </form>
<?php 
    mostrarFooter();
}
?>