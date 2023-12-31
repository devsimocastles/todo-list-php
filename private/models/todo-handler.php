<?php 

include ("../db/connect.php");
include ("../utils/base-location.php");
include ("../utils/print-error.php");
include ("../templates/templates.php");



$user_id = $_SESSION["user_id"];


/// CREAR TAREA ////////////////////////////////////////////////////////////////////

if ($_POST && isset($_POST["action"]) && $_POST["action"] == "create") {
    $new_task_name = htmlspecialchars($_POST["task_name"]); 
    
    $new_task_exist = "SELECT * from tarea where nombre = '$new_task_name'";

    // si el nombre de la nueva tarea está vacío
    if ($new_task_name == "") {
        $_SESSION["create_error"] = "empty_field";
        header("Location: ".base_location()."/todo");
        exit();
    }

    // si ya hay una tarea con el nombre con el que se intenta crear otra
    if ($conexion->query($new_task_exist)->rowCount() > 0) {
        $_SESSION["create_error"] = "already_exists";
        header("Location: ".base_location()."/todo");
        exit();
    }

    

    $sql = "INSERT INTO tarea (nombre, completada, id_usuario,descripcion) VALUES ('$new_task_name', '0',".$user_id.",'')";
    $query=$conexion->query($sql);
    if ($query) header("Location:".base_location()."/todo");
    exit();
}

///////////////////////////////////////////////////////////////////////////////////



//ELIMINAR TAREA ////////////////////////////////////////////////////////////////////////////////////////////
$operation = $_GET["action"]; $id = $_GET["id"];

$_SESSION["operation"] = $operation;
$_SESSION["task_id"] = $id; 

if ($operation == "delete") {
    $delete = "DELETE FROM tarea WHERE id_tarea = '$id'";
    $query = $conexion->query($delete);
    if ($query) header("Location:".base_location()."/todo");
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////



// EDITAR TAREA ///////////////////////////////////////////////////////////////////////////////////////////
if ($operation == "update") {
    mostrarHeader("Editar Tarea | ToDo App","task-editor");

    $get_task_data = "SELECT * FROM tarea WHERE id_tarea = ".$_SESSION['task_id'];

    $task_data = $conexion->query($get_task_data)->fetch(PDO::FETCH_ASSOC);

?>
    <main class="edit-task">
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
    </main>
<?php 
    mostrarFooter();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// MARCAR COMO COMPLETADA //////////////////////////////////////////////////////////////////////////////////////////////////////

if ($operation=="check") {
    // OBTENER EL ESTADO DE LA TAREA A MARCAR
     $sql = "SELECT completada FROM tarea WHERE id_tarea = '$id'";
     $is_task_complete = $conexion->query($sql)->fetch(PDO::FETCH_ASSOC)["completada"];
     $completed;
     ($is_task_complete) == "0" ? $completed="1" : $completed=="0";
     
     // CAMBIANDO EL ESTADO DE LA TAREA 
     $conexion->query("UPDATE tarea SET completada = '$completed' WHERE id_tarea = '$id'");
     header("Location:".base_location()."/todo");
     exit();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////