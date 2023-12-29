<?php

    require "../templates/templates.php";
    require "../utils/base-location.php";
    require "../utils/print-error.php";


    mostrarHeader("Iniciar Sesión - Todo App", "login");
?>
    <header>
        <h1>Iniciar Sesión</h1>
        <p>Inicia Sesión ahora en ToDo App</p>
    </header>
    <main>
        <form action="../controllers/login-validation.php" method="post">
            <label>
                Usuario
                <input type="text" name="user" placeholder="Usuario...">
            </label>
            <label>
                Contraseña
                <input type="password" name="pass" placeholder="Contraseña...">
            </label>
            <input type="submit" value="Ingresar">
            <?php 
                // esta función la uso para imprimir un h4 con el error a mostrar


                if (isset($_SESSION["login_error"])) {
                    echo "<div class='error-container'>";

                    $login_error = $_SESSION["login_error"];

                    if ($login_error == "empty_field") print_error("Los campos Usuario y Contraseña son obligatorios.");
                    if ($login_error == "wrong_password")  print_error("La contraseña es incorrecta.");
                    if ($login_error == "user_dont_exists") print_error("El usuario ingresado no existe.");

                    echo "</div>";
                }

                $_SESSION["login_error"] = null;
            ?>
        <h3>¿No tienes cuenta? <a href="<?= base_location()."/register" ?>" class="register-cta">Registrate Aquí</a></h3>
        </form>
    </main>
<?php
    mostrarFooter();
?>