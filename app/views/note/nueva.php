<h3>Añadir nueva nota:</h3>

<?php
    if (isset($_SESSION['nuevaNota'])) {
        if ($_SESSION['nuevaNota'] == 'completed') {
            header('Location:'.URL.'note/index');

        } else if ($_SESSION['nuevaNota'] == 'failed'){
            echo '<p class="alerta roja">Fallo al crear la nota.</p>';
        }

        // Elimino la info de esa sesión para que lo intente de nuevo:
        Utils::deleteSession('nuevaNota');
    }
?>

<section>
    <form action="<?=URL?>note/nueva" method="POST">
        <p>
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" required>
        </p>
        <p>
            <label for="color">Color: </label>
            <select name="color">
                <option value="yellow" selected>Amarillo</option>
                <option value="blue">Azul</option>
                <option value="green">Verde</option>
            </select>
        </p>
        <p>
            <label for="contenido">Contenido: </label>
            <textarea name="contenido" required></textarea>
        </p>
        <p>
            <input type="submit" value="Crear Nota">
            <input type="reset" value="Reiniciar Datos">
        </p>
    </form>
</section>