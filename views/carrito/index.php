<h1>Carrito de la compra</h1>

<table>

    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php foreach ($carrito as $key => $camisa) {
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
            <td><?= $camisa['unidades'] ?></td>

        </tr>
    <?php } ?>
</table>
<br>
<div class="total-carrito">
    <?php $stats  = Utils::statsCarrito() ?>
    <h3>Precio Total <?= $stats['total'] ?> € </h3>
    <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>