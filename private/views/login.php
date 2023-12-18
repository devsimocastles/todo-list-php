<?php
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
        </form>
        <h3>¿No tienes cuenta? <a href="<?= base_location()."/register" ?>" class="register-cta">Registrate Aquí</a></h3>
    </main>
<?php
    mostrarFooter();
?>