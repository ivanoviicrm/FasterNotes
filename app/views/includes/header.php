<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=NOMBRE_SITIO?></title>
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/css/styles.css">
</head>
<body>
    <header>
        <h1> <?=NOMBRE_SITIO?> </h1>
    </header>
    <nav>
        <!-- izquierda -->
        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) : ?>
        <ul class="izquierda">
            <li><a href="<?=URL?>note/mostrarTodas">Ver mis notas</a></li>
            <li><a href="<?=URL?>note/nueva">Nueva nota</a></li>
        </ul>
        <?php endif; ?>

        <!-- derecha -->
        <ul class="derecha">
            <!-- Si no hay sesion -->
            <?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) : ?>
                <li><a href="<?=URL?>user/login">Iniciar Sesión</a></li>
                <li><a href="<?=URL?>user/registrarse">Resgistrarse</a></li>
            <?php endif; ?>
            <!-- Si hay sesion -->
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) : ?>
                <li style="color: white;">Bienvenido, <?= $_SESSION['user']['nombre'] ?></li>
                <li><a href="<?=URL?>user/logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <main>

