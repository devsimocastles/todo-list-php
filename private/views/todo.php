<?php 

    include ("../utils/base-location.php");
    include ("../templates/templates.php");

    if ($_SESSION["logged"] != TRUE) {
        redirect_login("login","");
    }

    mostrarHeader("ToDo Editor | ToDo App", "todo-editor");
?> 

<header>
    <nav>
        <ul>
            <li><a href="<?= base_location()."/logout"?>">Cerrar Sesión</a></li>
            <!-- <li><a href=""></a></li> -->
        </ul>
    </nav>
</header>
<main>
    <h1>ToDo Editor</h1>
</main>

<?php 
    mostrarFooter();
?>