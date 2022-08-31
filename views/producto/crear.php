<?php if (isset($editar) && isset($product) && is_object($product)) : ?>
    <h1>Editar producto <?= $product->nombre ?></h1>
    <?php $url_action = base_url . "producto/saveProducto&id=" . $product->id; ?>

<?php else : ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url . "producto/saveProducto"; ?>


<?php endif; ?>
<div class="form_container">

    <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($product) && is_object($product) ? $product->nombre : '' ?>"> <br><br>


        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"><?= isset($product) && is_object($product) ? $product->descripcion : '' ?></textarea> <br><br>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?= isset($product) && is_object($product) ? $product->precio : '' ?>"> <br><br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= isset($product) && is_object($product) ? $product->stock : '' ?>"> <br><br>

        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($categoria = $categorias->fetch_object()) :  ?>
                <option value="<?= $categoria->id ?> " <?= isset($product) && is_object($product) && $categoria->id == $product->categoria_id ? 'selected' : ''; ?>>
                    <a href=""><?= $categoria->nombre ?></a>
                </option>
            <?php endwhile; ?>
        </select> <br><br>

        <label for="imagen">Imagen</label>
        <?php if (isset($product) && is_object($product) && !empty($product->imagen)) : ?>

            <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?> " class="thumb" alt=""><br>
        <?php endif; ?>

        <input type="file" name="imagen"> <br>

        <input type="submit" value="Guardar">
    </form>
</div>