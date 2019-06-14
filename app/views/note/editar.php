<h3>Editar nueva nota:</h3>

<?php

    /* params = a la nota que me pasan para cargar sus datos */

    if (isset($_SESSION['editarNota'])) {
        if ($_SESSION['editarNota'] == 'completed') {
            header('Location:'.URL.'note/index');

        } else if ($_SESSION['editarNota'] == 'failed'){
            echo '<p class="alerta roja">Fallo al crear la nota.</p>';
        }

        // Elimino la info de esa sesión para que lo intente de nuevo:
        Utils::deleteSession('editarNota');
    }
?>

<section>
    <form action="<?=URL?>note/editar" method="POST">
        <p>
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" value="<?=$params->getTitulo()?>"required>
        </p>
        <p>
            <input type="hidden" name="id" value="<?=$params->getId()?>">
            <input type="hidden" name="user_id" value="<?=$params->getUserId()?>">
        </p>
        <p>
            <label for="color">Color: </label>
            <select name="color">
                <option value="yellow" <?php if ($params->getColor() == 'yellow') { echo 'selected'; }?>>Amarillo</option>
                <option value="blue" <?php if ($params->getColor() == 'blue') { echo 'selected'; }?>>Azul</option>
                <option value="green" <?php if ($params->getColor() == 'green') { echo 'selected'; }?>>Verde</option>
            </select>
        </p>
        <p>
            <label for="contenido">Contenido: </label>
            <textarea name="contenido" required><?=$params->getContenido()?></textarea>
        </p>
        <p>
            <input type="submit" value="Editar Nota">
            <input type="reset" value="Reiniciar Datos">
        </p>
    </form>
</section>