<!--  <h1>Barra Lateral</h1>  -->
<aside id="lateral">

    <div id="carrito" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats  = Utils::statsCarrito() ?>
            <li> <a href="<?= base_url ?>carrito/index">Productos (<?= $stats['count'] ?>)</a> </li>
            <li> <a href="<?= base_url ?>carrito/index">Total (<?= $stats['total'] ?> €)</a> </li>
            <li> <a href="<?= base_url ?>carrito/index">Ver carrito</a> </li>

        </ul>


    </div>
    <div id="login" class="block_aside">
        <h3>Entrar en la web</h3>
        <?php if (!isset($_SESSION['identity'])) : ?>
            <form action="<?= base_url ?>usuario/login" method="Post">
                <label for="email">Email</label>
                <input type="email" name="email" id="">
                <label for="password">Password</label>
                <input type="password" name="password" id="">
                <input type="submit" value="Enviar">
            </form>

        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>
        <ul>

            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
                <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                <li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['identity'])) : ?>
                <!--  solo  pueden acceder usuarios que esten logueados -->
                <li><a href="<?= base_url ?>pedido/misPedidos">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>usuario/logout">Cerrar sesion</a></li>
            <?php else : ?>
                <li><a href="<?= base_url ?>usuario/registro">Registrate aquí</a></li>
            <?php endif; ?>
        </ul>
    </div>


</aside>
<!--  <h1>contenido central</h1>  -->
<div id="central">