<?php if (isset($product)) : ?>
    <h1><?= $product->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($product->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" alt="">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
            <?php endif; ?>
        </div>
        <div class="data">
            <div class="description">
                <p><?= $product->descripcion ?> </p>
            </div>
            <div class="price">
                <p><?= $product->precio ?> €</p>
            </div>
            <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="button button-small">Comprar</a>
        </div>
    </div>

<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>