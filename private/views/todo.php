<?php 

    include ("../utils/base-location.php");
    include ("../templates/templates.php");
    include ("../db/connect.php");

    if ($_SESSION["logged"] != TRUE) {
        redirect_login("login","");
    }

    $user_id = $_SESSION["user_id"];

    mostrarHeader("ToDo Editor | ToDo App", "todo-editor");
?> 

<header>
    <nav>
        <h1 class="logo">ToDo App</h1>
        <ul class="links">
            <li><a href="<?= base_location()."/logout"?>">Cerrar Sesión</a></li>
            <li><a href="<?= base_location()."/profile"?>">Mi cuenta</a></li>
        </ul>
        <div class="profile-pic">
            <img src="#" alt="Foto de Perfil">
        </div>
    </nav>
</header>
<main>
<form action="../models/todo-validation.php" method="post">
    <label>
        Crear Tarea
        <input type="text" name="task_name" placeholder="Nombre de la tarea...">
        <input type="hidden" name="action" value="create">
        <input type="submit" value="Crear Tarea">
    </label>
</form>
    <?php
        $get_tasks = "SELECT * FROM tarea WHERE id_usuario = '$user_id'";
        $task_count = $conexion->query($get_tasks)->rowCount();
        // IF COUNT IS < 1 SHOW A MESSAGE///////////////////////
        if ($task_count < 1) {
    ?>
        <h2>No hay ninguna tarea pendiente, ¡crea una!</h2>
    <?php 
        } 
        ///////////////////////////////////////////////////////
        else {
    ?>  
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
                // ELSE, SHOW ALL TASKS IN THE TABLE////////////
                $tasks = $conexion->query($get_tasks)->fetchAll(PDO::FETCH_ASSOC);
              
                foreach ($tasks as $task) {      
                    $id_tarea = $task["id_tarea"];
                    $nombre = $task["nombre"];
                    $completada = $task["completada"];
                    $descripcion = $task["descripcion"];
                    ?>
                    <tr>
                        <td><?=$id_tarea?></td>
                        <td><?=$nombre?></td>
                        <td><?=$descripcion?></td>
                        <td><?=$completada?></td>
                        <td>
                            <a href="../models/todo-handler.php?action=u&id=<?=$id_tarea?>">Editar</a>
                            <a href="../models/todo-handler.php?action=d&id=<?=$id_tarea?>">Eliminar</a>
                        </td>
                    </tr>
            <?php 
                }
                ////////////////////////////////////////////////
                ?>
    
        </table>
    <?php 
        }
    ?>
</main>

<?php 
    mostrarFooter();
?> 