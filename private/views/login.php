<?php
    session_start();

    require "../templates/templates.php";
    require "../utils/base-location.php";
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
                <input type="pass" name="pass" placeholder="Contraseña...">
            </label>
            <input type="submit" value="Ingresar">
            <?php 
                // esta función la uso para imprimir un h4 con el error a mostrar
                function print_error($msg) {
                    echo "<h4 class='error-msg'>Error: $msg</h4>";
                }

                if (isset($_SESSION["error"])) {
                    echo "<div class='error-container'>";

                    if ($_SESSION["error"] == "wrong_password")  print_error("La contraseña es incorrecta.");
                    if ($_SESSION["error"] == "user_dont_exists") print_error("El usuario ingresado no existe.");
                    echo "</div>";
                }
            ?>
        </form>
        <h3>¿No tienes cuenta? <a href="<?= base_location()."/register" ?>" class="register-cta">Registrate Aquí</a></h3>
    </main>
<?php
    mostrarFooter();
?>