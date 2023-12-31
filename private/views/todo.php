<?php

include("../utils/base-location.php");
include("../templates/templates.php");
include("../utils/print-error.php");
include("../db/connect.php");

if ($_SESSION["logged"] != TRUE) {
    redirect_login("login", "");
}

$user_id = $_SESSION["user_id"];

$get_tasks = "SELECT * FROM tarea WHERE id_usuario = '$user_id'";
$task_count = $conexion->query($get_tasks)->rowCount();

mostrarHeader("ToDo Editor | ToDo App", "todo-editor");
?>

<header>
    <nav>
        <h1 class="logo">ToDo App</h1>
        <ul class="links">
            <li><a href="<?= base_location() . "/logout" ?>">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>
<main>
    <!-- SI LA CANTIDAD DE TAREAS ES IGUAL A 10, MUESTRA EL MENSAJE DENTRO DEL H2 -->
    <?php if ($task_count == 10) { ?>
        <h2>Has alcanzado el límite de 10 tareas! Elimina alguna para crear otra!</h2>
    <?php } else { ?>
        <!------------------------------------------------------------------------------------>
        <!-- SI LA CANTIDAD DE TAREAS ES MENOR A 10, MUESTRA EL FORMULARIO PARA CREAR OTRAS -->
        <form action="../models/todo-handler.php" method="post" class="create-task-form">
            <label>
                Crear Tarea
                <input type="text" name="task_name" placeholder="Nombre de la tarea...">
                <input type="hidden" name="action" value="create">
                <input type="submit" value="Crear Tarea">
            </label>
            <?php
            if (isset($_SESSION["create_error"])) {
                if ($_SESSION["create_error"] == "empty_field") print_error("El campo no puede estar vacío");
                if ($_SESSION["create_error"] == "already_exists") print_error("Ya existe una tarea con este nombre");
            }
            $_SESSION["create_error"] = null;
            ?>
        </form>
        <!------------------------------------------------------------------------------------>
        <!-- SI LA CANTIDAD DE TAREAS ES MENOR A 1, MUESTRA EL MENSAJE -->
    <?php }
    if ($task_count < 1) { ?>
        <h2>No hay ninguna tarea pendiente, ¡crea una!</h2>
    <?php } else { ?>
        <!------------------------------------------------------------------------------------>
        <!-- SI LA CANTIDAD DE TAREAS ES MAYOR A UNO, MUESTRA LA TABLA CON LAS TAREAS -->
        <div class="table-wrapper">


            <table class="task-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tarea</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <?php
                $tasks = $conexion->query($get_tasks)->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tasks as $task) {
                    $id_tarea = $task["id_tarea"];
                    $nombre = $task["nombre"];
                    $completada = $task["completada"];
                    $descripcion = $task["descripcion"];
                ?>
                    <tr>
                        <td><?= $id_tarea ?></td>
                        <td><div class="scrollable"><?= $nombre ?></div></td>
                        <td><div class="scrollable"><?= $descripcion ?></div></td>
                        <td><?= ($completada != "0") ? "Completada" : "No Completada"; ?></td>
                        <td>
                            <a href="../models/todo-handler.php?action=update&id=<?= $id_tarea ?>">Editar</a>
                            <a href="../models/todo-handler.php?action=delete&id=<?= $id_tarea ?>">Eliminar</a>
                            <a href="../models/todo-handler.php?action=check&id=<?= $id_tarea ?>">Marcar/Desmarcar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    <?php } ?>
    <!------------------------------------------------------------------------------------>
</main>

<?php
mostrarFooter();
?>