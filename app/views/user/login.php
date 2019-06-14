<h3>Iniciar Sesión</h3>

<?php
    if (isset($_SESSION['login']) && !empty($_SESSION)) {
        if ($_SESSION['login'] == 'correcto') {
            header('Location:'.URL.'note/index');
            
        } else {
            echo '<p class="alerta roja">' . $_SESSION['login'] . '</p>';
        }

        // Elimino la info de esa sesión para que lo intente de nuevo:
        Utils::deleteSession('login');
    }

?>
<section>
    <form action="<?=URL?>user/login" method="POST">
        <p>
            <label for="email">Email: </label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label for="password">Password: </label>
            <input type="password" name="password" required>
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>
</section>