<h1>Detalles del pedido</h1>

<?php if ($pedido) : ?>

    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido</h3><br>

        <form action="<?= base_url ?>pedido/estado" method="POST">
            <input type="hidden" value="<?= $pedido->id ?>" name="pedido_id" />
            <select name="estado" id="">

                <option value="confirm" <?= $pedido->estado == 'confirm' ? 'selected' : ''; ?>>Pendiente</option>
                <option value="preparation" <?= $pedido->estado == 'preparation' ? 'selected' : ''; ?>> En preparation</option>
                <option value="ready" <?= $pedido->estado == 'ready' ? 'selected' : ''; ?>>Preparado para el envío</option>
                <option value="sended" <?= $pedido->estado == 'sended' ? 'selected' : ''; ?>>Enviado</option><br>

                <input type="submit" value="Cambiar estado">
            </select>
        </form>

    <?php endif ?>
    <br>

    <h3>Direccion del envío</h3>

    Provincia: <?= $pedido->provincia ?> <br>
    Localidad : <?= $pedido->localidad ?> <br>
    Direccion : <?= $pedido->direccion ?> <br>
    <br>
    <h3>Datos del pedido</h3>
    Estado del pedido: <?= Utils::showEstado($pedido->estado) ?> <br>
    Número de pedido: <?= $pedido->id ?> <br>
    Total a pagar: <?= $pedido->coste ?> $ <br>
    Productos :

    <table>

        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>

            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="" class="img_carrito">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" alt="" class="img_carrito">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>">
                        <?= $producto->nombre ?>
                    </a>
                </td>
                <td><?= $producto->precio ?></td>
                <td><?= $producto->unidades ?></td>

            </tr>

        <?php endwhile; ?>
    </table>
<?php endif; ?>