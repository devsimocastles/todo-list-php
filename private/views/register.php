<?php 

    require "../templates/templates.php";
    require "../utils/base-location.php";
    require "../utils/print-error.php";

    mostrarHeader("Registrarse - Todo App", "register");
?>

<header>
    <h1>Unirse a Todo App</h1>
    <p>Para crear tu cuenta en Todo App, completa el siguiente formulario</p>
</header>
<main>
    <form action="../controllers/register-validation.php" method="post">
        <label>Usuario
            <input type="text" name="user" placeholder="Usuario...">
        </label>
        <label>Confirmar Usuario
            <input type="text" name="confirm_user" placeholder="Confirmar Usuario...">
        </label>
        <label>Contraseña
            <input type="password" name="pass" placeholder="Contraseña">
        </label>
        <label>Confirmar Contraseña
            <input type="password" name="confirm_pass" placeholder="Confirmar Contraseña">
        </label>
        <input type="submit" value="Registrarme">

        <?php 
            if (isset($_SESSION["register_error"])) {
                echo "<div class='error-container'>";

                $register_error = $_SESSION["register_error"];

                // errores campo usuario //
                if ($register_error == "empty_field") print_error("Los campos no pueden estar vacíos.");
                if ($register_error == "users_dont_match") print_error("Los nombres de usuario no coinciden."); 
                if ($register_error == "user_invalid_length") print_error("El nombres de usuario deben tener como mínimo 8 carácteres. ");
                if ($register_error == "invalid_user") print_error("El nombre de usuario sólo puede contener letras y números.");
                
                // errores campo contraseña //
                
                echo "</div>";
            }

            $_SESSION["register_error"] = null;
        ?>
    </form>
    <h3>¿Ya tienes cuenta? 
        <a href="<?= base_location()."/login"?>" class="login-cta">
            Ingresa a tu cuenta aquí
        </a>
    </h3>
</main>

<?php 
    mostrarFooter();
?>