<h1>Registrarse</h1>

<?php
if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') { ?>
    <strong class="alert-green">Registro completado correctamente</strong>

<?php } elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') { ?>
    <strong class="alert-red">Registro fallido, Introduce bien los datos</strong>
<?php } ?>
<?php Utils::deleteSesion('register'); ?>


<form action="<?= base_url ?>usuario/saveUser" method="POST">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" placeholder="Introduzca su nombre">


    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" placeholder="Introduzca su apellidos">

    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Introduzca su email">

    <label for="password">Contraseña</label>
    <input type="password" name="password" placeholder="Introduzca su contraseña">

    <input type="submit" value="Registrarse">

</form>