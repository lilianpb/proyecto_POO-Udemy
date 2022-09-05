<?php
if (isset($_SESSION['identity'])) : ?>

    <h1>Hacer pedido</h1>
    <a href=" <?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a> <br><br>
    <h3>Domicilio para hacer el envio:</h3>
    <form action="<?= base_url . 'pedido/add' ?>" method="post">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia">

        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad">

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion">

        <input type="submit" value="Confirmar Pedido">



    </form>
<?php else : ?>

    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logeado en la web para hacaer tu pedido </p>
<?php endif; ?>