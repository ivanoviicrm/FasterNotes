<h3>Registro:</h3>

<?php
if (isset($_SESSION['registrado'])) {
        if ($_SESSION['registrado'] == 'completed') {
            echo '<p class="alerta verde">Registro completado.</p>';

        } else if ($_SESSION['registrado'] == 'failed'){
            echo '<p class="alerta roja">Fallo al registrarse.</p>';
        }

        // Elimino la info de esa sesión para que lo intente de nuevo:
        Utils::deleteSession('registrado');
    }

?>

<section>
<form action="<?=URL?>user/registrarse" method="POST">
    <p>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" required>
    </p>
    <p>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido">
    </p>
    <p>
        <label for="email">Email: </label>
        <input type="email" name="email" required>
    </p>
    <p>
        <label for="password">Password: </label>
        <input type="password" name="password" required>
    </p>
    <p>
        <input type="submit" name="submit" value="Registrarse">
    </p>
</form>
</section>