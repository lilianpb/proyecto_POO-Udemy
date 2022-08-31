<h1>Gestion de productos</h1>
<a href="<?= base_url ?>producto/crear" class="button button-small">Crear producto</a>
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_green">El produto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <strong class="alert_red">El produto no se ha agregado, intentelo de nuevo</strong>
<?php endif; ?>
<?php Utils::deleteSesion('producto'); ?>
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_green">El produto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong class="alert_green">El produto no se ha borradp correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSesion('delete'); ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Accion</th>
    </tr>
    <?php while ($producto = $productos->fetch_object()) : ?>


        <tr>
            <td><?= $producto->id; ?></td>
            <td><?= $producto->nombre; ?></td>
            <td><?= $producto->precio; ?></td>
            <td><?= $producto->stock; ?></td>
            <td>
                <a href="<?= base_url ?>producto/editar&id=<?= $producto->id ?>" class="button button-gestion ">Editar</a>

                <a href="<?= base_url ?>producto/eliminar&id=<?= $producto->id ?>" class="button button-gestion button-red">Eliminar</a>


            </td>

        </tr>
    <?php endwhile; ?>
</table>