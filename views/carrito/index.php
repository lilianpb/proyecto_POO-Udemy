<h1>Carrito de la compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>

        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($carrito as $indice => $camisa) {
            $product = $camisa['producto'];
        ?>
            <tr>
                <td>
                    <?php if ($product->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="" class="img_carrito">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" alt="" class="img_carrito">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
                        <?= $product->nombre ?>
                    </a>
                </td>
                <td><?= $product->precio ?></td>
                <td>
                    <?= $camisa['unidades'] ?>
                    <div class="updown-unidades">

                        <a href="<?= base_url ?>carrito/up&indice=<?= $indice ?>" class="button"> + </a>
                        <a href="<?= base_url ?>carrito/down&indice=<?= $indice ?>" class="button"> - </a>
                    </div>
                </td>
                <td>
                    <a href="<?= base_url ?>carrito/remove&index= <?= $indice ?>" class="button  button-carrito button-red">Quitar producto</a>
                </td>

            </tr>
        <?php } ?>
    </table>

    <br>
    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/deleteAll" class="button button-delete button-red">Vaciar carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats  = Utils::statsCarrito() ?>
        <h3>Precio Total <?= $stats['total'] ?> € </h3>
        <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
    </div>
<?php else : ?>
    <p>El carrito esta vacio añade algun producto</p>
<?php endif; ?>