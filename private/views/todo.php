<?php 

    include ("../utils/base-location.php");
    include ("../templates/templates.php");
    include ("../db/connect.php");

    if ($_SESSION["logged"] != TRUE) {
        redirect_login("login","");
    }

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

        $get_tasks = "SELECT * FROM tarea WHERE "

        $tasks = $conexion->query

    ?>
</main>

<?php 
    mostrarFooter();
?> 