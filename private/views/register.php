<?php 
    session_start();

    require "../templates/templates.php";
    require "../utils/base-location.php";

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
    </form>
</main>

<?php 
    mostrarFooter();
?>