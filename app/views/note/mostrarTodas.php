<h3>Mis notas:</h3>

<?php if ($params) : ?>
    <?php foreach ($params as $nota) : ?>
        <section id="<?= $nota->getId() ?>" class="<?= $nota->getColor(); ?>">
            <p class="titulo"><?= $nota->getTitulo(); ?></p>
            <p class="fecha"><?= $nota->getFecha(); ?></p>
            <p class="contenido"><?= $nota->getContenido(); ?></p>
            <a href="<?= URL ?>note/editar/<?= $nota->getId() ?>"><input type="button" value="Editar" class="editar"></a>
            <a href="<?= URL ?>note/eliminar/<?= $nota->getId() ?>"><input type="button" value="Eliminar" class="eliminar"></a>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <p class="alerta roja">Wops! No se encontraron notas tuyas.</p>
<?php endif; ?>